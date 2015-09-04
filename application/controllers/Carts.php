<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/******** CHECKLIST ************
validate_cart() -> updates the cart to make sure items aren't sold out or over qty
				   use this before every load and right before a purchase
				   if a change has been made, reload the cart with a change message



*******************/
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
		$this->Cart->add_item($this->input->post());
		$this->template->load('bootstrap', 'carts/cart', array(
			'title' => 'FaithWraps Shopping Cart',
			'cart' => $this->Cart->get_all_items()
		));
	}

	/**
	 * Displays billing page
	 */
	function billing()
	{
		$this->template->load('bootstrap', 'billing', array(
			'title' => 'FaithWraps - Billing'
		));
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
		// $user = $this->session->userdata('user');
		$user['id'] = 1;

		$this->template->load('bootstrap', 'review', array(
			'title' => 'Review Order Details',
			'cart' => $this->Cart->stripe_test(),
			'billing' => $this->Billing_Address->fetch(array('user_id' => $user['id'])),
			'mailing' => $this->Mailing_Address->fetch(array('user_id' => $user['id']))
		));
	}

	function submit_order()
	{
		// $user = $this->session->userdata('user');
		$user['id'] = 1;

		//
		$result = $this->stripe_api->charge(
			$this->session->userdata('stripe_token'),
			$this->Billing_Address->fetch(array('user_id' => $user['id'])), 
			$this->Cart->stripe_test(), 
			$user
		);

		if ($charge->paid == TRUE)
		{
			var_dump('here');
			// $charge->id (store to DB. Need a column in the order table)

			// Move stuff from cart to orders & order parts

			// Clear cart

			// Send user to confirmation screen
		}
	}
}

