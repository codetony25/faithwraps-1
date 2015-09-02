<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_controller {

	public function __construct() {
		parent::__construct();
	}

	public function show($id) {

		var_dump($this->Product->fetch( array('product_id' => 1)) );

		$this->template->load( 'bootstrap', 'products/product', array(
			
		));
	}

}

