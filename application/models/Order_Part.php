<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Part extends CI_model {
	const TABLE = 'order_parts';

	use DB_trait;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_order_parts_joined($order_id) {
	// returns all the order parts associated with an order and joins the
	// product and style information
		$product_table = Product::TABLE;
		$style_table = Product_Style::TABLE;
		$order_table = Order::TABLE;
		$order_part_table = self::TABLE;

		$this->db->select("$order_part_table.id, $order_part_table.order_id, $order_part_table.product_id, $order_part_table.product_style_id as style_id");
		$this->db->select("$product_table.name as product_name");
		$this->db->select("$style_table.name as style_name, $style_table.image as style_image");

		$this->db->join($style_table, "$style_table.id = $order_part_table.product_style_id", "left");
		$this->db->join($product_table, "$product_table.id = $style_table.product_id", "left");

		return $this->fetch_all_where(array('order_id'=>$order_id));
	}
}
