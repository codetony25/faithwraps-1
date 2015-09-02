<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_controller {

	public function __construct() {
		parent::__construct();
		$this->load->Model('Category');
	}

	public function show($id) {
		$category = $this->Category->fetch(array('id',$id));
		$products = $this->Product->fetch_all_where(array('gallery_id',$category['id']));
		$this->template->load('bootstrap', 'categories/category', array(
			'title' => 'Login Registration',
			'category' => $category,
			'products' => $products
		));
	}

}

?>