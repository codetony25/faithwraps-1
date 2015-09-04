<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_controller {

	public function __construct() {
		parent::__construct();
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


}

