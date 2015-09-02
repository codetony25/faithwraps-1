<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_controller {

	public function __construct() {
		parent::__construct();
		$this->load->Model('Category');
	}

	public function show($id) {
		$view_data = $this->Category->get_show_data($id);
		$view_data['title'] = $view_data['category']['name'];

		$this->template->load('bootstrap', 'categories/category', $view_data);
	}

	public function get_style($id) {
		return $this->Product_Style->fetch_where(array('product_id'=>$id));
	}

}

?>