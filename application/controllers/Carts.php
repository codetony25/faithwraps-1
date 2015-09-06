<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('Stripe_api');
		$this->output->enable_profiler();
	}

	/**
	 * Loads default cart view: carts/cart
	 */
	public function index() {
		$this->template->load('bootstrap', 'carts/cart', array(
			'title' => 'FaithWraps Shopping Cart',
			'cart' => $this->Cart->get_all_items()
		));
	}

	/**
	 * Adds a single item from a post form to the user's cart
	 */
	public function add_to_cart() {
	// Adds an item to the cart
		$user = $this->session->userdata('user');
		if ($user['id']) {
			// Logged in add to cart
			$this->Cart->add_item($this->input->post());
		} else {
			// Session add to cart
			$this->Cart->add_item_session($this->input->post());
		}

		redirect('/carts');
	}

	/**
	 * Saves the shipping information from the shipping form in step 1 of checkout
	 */
	public function save_shipping() {
		/* NEEDS FORM VALIDATION */
		$this->Mailing_Address->save_shipping($this->input->post());

		redirect('/billing');
	}

	/**
	 * Loads the 1st step of the checkout process: carts/shipping
	 */
	public function shipping() {
		// If the user isn't logged in, redirect them to login and set a target page
		if ($user = $this->session->userdata('user')) {
			$this->template->load('bootstrap', 'carts/shipping', array(
				'title' => 'FaithWraps Checkout',
				'shipping' => $this->Mailing_Address->get_shipping()
			));
		} else {
			$this->session->set_userdata('target_page', 'shipping');
			redirect('/login');
		}
	}

	/**
	 * Loads the 2nd step of the checkout process: carts/billing
	 */
	public function billing() {
		if ($user = $this->session->userdata('user')) {
			$this->template->load('bootstrap', 'carts/billing', array(
				'title' => 'FaithWraps Checkout',
				'billing' => $this->Billing_Address->get_billing()
			));
		} else {
			$this->session->set_userdata('target_page', 'shipping');
			redirect('/login');
		}
	}

	/**
	 * @return json repsonse for validating billing info
	 */
	function billing_info_validate()
	{
		if ($this->form_validation->run('billing'))
			echo json_encode(TRUE);
		else
			echo json_encode(validation_errors());

		exit();
	}

	/**
	 * Endpoint for billing form.  Form has been validated by this point
	 */
	function checkout()
	{	
		$post = $this->input->post();

		$this->Billing_Address->save_billing($post);

		if ($token = $post['stripeToken'])
		{
			// To be used later to verify token has not already been used
			$this->session->set_userdata('stripe_token', $token);
			$this->session->set_userdata('last_4', $post['last4']);

			redirect('/carts/review');
		}
		else
		{
			$feedback = 'The order could not be processed. You have not been charged. Please confirm that you have JavaScript enabled and try again.';
		}
		redirect('/carts/billing');
	}

	/**
	 * Loads the review step of the checkout process: carts/review
	 */
	function review()
	{
		$user = $this->session->userdata('user');

		$this->template->load('bootstrap', 'carts/review', array(
			'title' => 'Review Order Details',
			'cart' => $this->Cart->get_all_items(),
			'billing' => $this->Billing_Address->fetch(array('user_id' => $user['id'])),
			'mailing' => $this->Mailing_Address->fetch(array('user_id' => $user['id']))
		));
	}

	/**
	 * Submits the order to the stripe api
	 * and directs the user according to the response
	 */
	function submit_order()
	{
		$user = $this->session->userdata('user');

		//
		$charge = $this->stripe_api->charge(
			$this->session->userdata('stripe_token'),
			$this->Billing_Address->fetch(array('user_id' => $user['id'])), 
			$this->Cart->get_all_items(), 
			$user
		);

		if (!isset($charge->paid)) {
			echo json_encode(array("Problem processing your request.",
									$charge));
		} 
		elseif ($charge->paid == TRUE)
		{
			$this->Cart->checkout_success($charge->id);
			redirect('/confirmation');
		}
	}

	/**
	 * Loads the confirmation page after an order was successful
	 */
	public function confirmation() {
		$this->template->load('bootstrap', 'carts/confirmation', array(
				'title' => 'Confirmation'
		));
	}

	/**
	 * Deletes an item from the cart and redirects back to the cart page
	 */
	public function del_item() {
		$item_id = $this->input->post('item_id');
		$this->Cart->del_cart_item($item_id);
		redirect('/cart');
	}
}

