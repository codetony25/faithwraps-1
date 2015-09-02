<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_model {

	function get_random_products($limit = 10)
	{
		$styles = Product_Style::TABLE;
		$products = Product::TABLE;

		$this->db->select("$products.id, $products.name, $products.price, $styles.image");
		$this->db->from($products);
		$this->db->join($styles, "$products.id = $styles.product_id");
		$this->db->order_by("$products.id", 'RANDOM');
		$this->db->group_by("$products.id");
		$this->db->limit($limit);

		return $this->db->get()->result_array();
	}

}