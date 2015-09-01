<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_controller {

	public function __construct() {
		parent::__construct();

		$this->load->Model('Product');
	}

	public function index() {

	}

	public function get_product($id) {

	}
}

