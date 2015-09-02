<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_model {
	const TABLE = 'orders';

	use DB_trait;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_orders() {
	// Pulls all the orders and joins user, addresses, and all order parts.
		$product_table = Product::TABLE;
		$style_table = Product_Style::TABLE;
		$order_table = self::TABLE;
		$order_part_table = Order_Part::TABLE;
		$user_table = User::TABLE;
		$mailing_address_table = Mailing_Address::TABLE;
		$billing_address_table = Billing_Address::TABLE;

		// $this->db->select("");
		$this->db->join($order_table, "$order_part_table.order_id = $order_table.id");
		$this->db->join($user_table, "$user_table.id = $order_table.user_id");
		$this->db->join($mailing_address_table, "$mailing_address_table.user_id = $user_table.id");
		$this->db->join($billing_address_table, "$billing_address_table.user_id = $user_table.id");
		$this->db->join($style_table, "$style_table.product_id = $order_part_table.product_id");
		return $this->Order_Part->fetch_all();
	}

}