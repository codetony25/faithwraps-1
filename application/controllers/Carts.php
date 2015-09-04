<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('Stripe_api');
		$this->output->enable_profiler();
	}

	public function index() {
		$this->template->load('bootstrap', 'carts/cart', array(
			'title' => 'FaithWraps Shopping Cart',
			'cart' => $this->Cart->get_all_items()
		));
	}

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

	public function save_shipping() {
		/* NEEDS FORM VALIDATION */
		$this->Mailing_Address->save_shipping($this->input->post());

		redirect('/billing');
	}

	public function shipping() {
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

	public function billing() {
		if ($user = $this->session->userdata('user')) {
			$this->template->load('bootstrap', 'carts/billing', array(
				'title' => 'FaithWraps Checkout'
			));
		} else {
			$this->session->set_userdata('target_page', 'shipping');
			redirect('/login');
		}
	}

	/**
	 * 
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

	public function confirmation() {
		$this->template->load('bootstrap', 'carts/confirmation', array(
				'title' => 'Confirmation'
		));
	}
}

