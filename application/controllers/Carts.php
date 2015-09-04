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
	 * Endpoint for billing form.  Validated form and checks for Stripe Token
	 */
	function checkout()
	{
		if ($this->form_vaidation->run('billing'))
		{

		}
		else
		{
			$this->session->set_flashdata('billing_feedback', validation_errors());
		}
	}

	/**
	 * 
	 */
	function process()
	{
		$feedback = [];

		if ($token = $this->input->post('stripeToken'))
		{
			// To be used later to verify token has not already been used
			$this->session->set_userdata('stripe_token', $token);
			
		}
		else
		{
			$feedback[] = 'The order could not be processed. You have not been charged. Please confirm that you have JavaScript enabled and try again.';
		}

		redirect('/carts/review');
	}

	function review()
	{
		$this->template->load('bootstrap', 'review', array(
			'title' => 'Review Order Details'
		));
	}
}

