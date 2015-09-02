<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_model {

	const TABLE = 'galleries';

	public function fetch($data) {
		return $this->db->get_where(self::TABLE, $data, 1)->row_array();
	}

	public function fetch_all() {
		return $this->db->get(self::TABLE)->result_array();
	}

	public function get_show_data($id) {
		$product_table = Product::TABLE;
		$style_table = Product_Style::TABLE;

		$category = $this->Category->fetch(array('id'=>$id));
		$this->db->distinct();
		$this->db->group_by("$product_table.name");
		$this->db->join($product_table, "$product_table.id=product_id");
		$this->db->where("$product_table.gallery_id", $id);
		$products = $this->db->get($style_table)->result_array();

		return array('category' => $category,
			'products' => $products);
	}
}
