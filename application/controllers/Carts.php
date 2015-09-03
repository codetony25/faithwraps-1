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

}

