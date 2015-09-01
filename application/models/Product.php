<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_model {

	public function get_all_products() {
		return $this->db->get('products')->result_array();
	}

	public function get_all_styles() {
		return $this->db->get('product_styles')->result_array();
	}

	public function get_all_galleries() {
		return $this->db->get('galleries')->result_array();
	}

	public function get_all_gems() {
		return $this->db->get('gems')->result_array();
	}	

	public function get_product_by($field, $value) {
		$this->db->where($field, $value);
		return $this->db->get('products')->row_array();
	}


}

