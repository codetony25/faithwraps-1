<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_controller {

	public function __construct() {
		parent::__construct();
	}

	public function show($id) {

		$product = $this->Product->fetch(array('id' => $id));

		$this->template->load( 'bootstrap', 'products/product', array(
			'product' => $product,
			'styles' => $this->Product_Style->fetch_all_where(array('product_id'=>$id)),
			'gem' => $this->Gem->fetch(array('id'=>$product['gem_id'])),
			'similar' => $this->Product->fetch_similar($product['gallery_id']),
			'js_files' => array('products_view.js')
		));
	}

}

