<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('security');
	}

	public function show($id) {

		$product = $this->Product->fetch(array('id' => $id));

		$this->template->load( 'bootstrap', 'products/product', array(
			'product' => $product,
			'styles' => $this->Product->fetch_product_styles($id),
			'gem' => $this->Product->fetch_product_gem($product['id']),
			'similar' => $this->Product->fetch_similar($product['gallery_id'])
		));
	}

}

