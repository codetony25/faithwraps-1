<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_model {
	const TABLE = 'orders';

	use DB_trait;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_order_joined($id) {
	// Adds the user and address info to an order
		$product_table = Product::TABLE;
		$style_table = Product_Style::TABLE;
		$order_table = self::TABLE;
		$order_part_table = Order_Part::TABLE;
		$user_table = User::TABLE;
		$mailing_address_table = Mailing_Address::TABLE;
		$billing_address_table = Billing_Address::TABLE;

		$this->db->select("$order_table.id, $order_table.user_id, $order_table.total_price, $order_table.shipping, $order_table.tax, $order_table.filled, $order_table.shipped, $order_table.tracking");
		$this->db->select("$user_table.first_name as user_first_name, $user_table.last_name as user_last_name, $user_table.email as user_email");
		$this->db->select("$mailing_address_table.first_name as mailing_first_name, $mailing_address_table.last_name as mailing_last_name, $mailing_address_table.address as mailing_address, $mailing_address_table.address_2 as mailing_address_2, $mailing_address_table.city as mailing_city, $mailing_address_table.state as mailing_state, $mailing_address_table.zip_code as mailing_zip_code, $mailing_address_table.country as mailing_country");
		$this->db->select("$billing_address_table.first_name as billing_first_name, $billing_address_table.last_name as billing_last_name, $billing_address_table.address as billing_address, $billing_address_table.address_2 as billing_address_2, $billing_address_table.city as billing_city, $billing_address_table.state as billing_state, $billing_address_table.zip_code as billing_zip_code, $billing_address_table.country as billing_country");
		
		$this->db->join($user_table, "$user_table.id = $order_table.user_id", "left");
		$this->db->join($mailing_address_table, "$mailing_address_table.user_id = $user_table.id", "left");
		$this->db->join($billing_address_table, "$billing_address_table.user_id = $user_table.id", "left");
		
		return $this->fetch(array($order_table.'.id'=>$id));
	}

}