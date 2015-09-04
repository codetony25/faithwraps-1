<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'traits/DB_Trait.php';

class Cart extends CI_model {

	use DB_Trait;

	const TABLE = 'carts';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_items() {
		$product_table = Product::TABLE;
		$product_style_table = Product_Style::TABLE;
		$cart_table = self::TABLE;
		$user = $this->session->userdata('user');

		// Get the product with the product style
		$this->db->select("$cart_table.id, $cart_table.product_id as product_id, $cart_table.product_style_id as product_style_id, $cart_table.qty, $product_table.name as product_name, $product_style_table.name as product_style_name, $product_style_table.image, $product_table.price as product_price, $product_table.shipping as shipping");
		$this->db->join($product_style_table, "$product_style_table.id = $cart_table.product_style_id");
		$this->db->join($product_table, "$product_table.id = $product_style_table.product_id");
		
		$cart['items'] = $this->fetch_all_where(array($cart_table.'.user_id'=>$user['id']));

		$cart['total'] = 0;
		foreach($cart['items'] as $item) {
			$cart['total'] += $item['product_price'] * $item['qty'];
		}
		return $cart;
	}

	public function add_item($post) {
		$product_table = Product::TABLE;
		$product_style_table = Product_Style::TABLE;

		// DO FORM VALIDATION
		if ($post['product_qty'] <= 0) {
			return false;
		}

		// For logged in users only atm
		$user = $this->session->userdata('user');		

		// Get the product with the product style
		$this->db->select("$product_table.id as product_id, $product_style_table.id as product_style_id, $product_table.qty as max_qty");
		$this->db->join($product_table, "$product_style_table.product_id = $product_table.id");
		$product = $this->Product_Style->fetch(array($product_style_table.'.id'=>$post['product_style']));

		if ($product) {
			/****
				Need logic for adding to the cart where the same item already exists

			***/

			// Start building the new cart item
			$new_cart_item['user_id'] = $user['id'];
			$new_cart_item['product_id'] = $product['product_id'];
			$new_cart_item['product_style_id'] = $product['product_style_id'];

			// Make sure the qty being added isn't greater than the max available
			$new_cart_item['qty'] = ($post['product_qty'] > $product['max_qty']) ? $product['max_qty'] : $post['product_qty'];
			
			// Add the item to the cart, then validate the cart
			$this->db->insert(self::TABLE, $new_cart_item);

			// validate the cart
			//$this->validate_cart();
		}

	}

		public function stripe_test() {
		$product_table = Product::TABLE;
		$product_style_table = Product_Style::TABLE;
		$cart_table = self::TABLE;
		// $user = $this->session->userdata('user');

		// Get the product with the product style
		$this->db->select("$cart_table.id, $cart_table.product_id as product_id, $cart_table.product_style_id as product_style_id, $cart_table.qty, $product_table.name as product_name, $product_style_table.name as product_style_name, $product_style_table.image, $product_table.price as product_price, $product_table.shipping as shipping");
		$this->db->join($product_style_table, "$product_style_table.id = $cart_table.product_style_id");
		$this->db->join($product_table, "$product_table.id = $product_style_table.product_id");
		
		$cart['items'] = $this->fetch_all_where(array($cart_table.'.user_id'=>1));

		$cart['total'] = 0;
		foreach($cart['items'] as $item) {
			$cart['total'] += $item['product_price'] * $item['qty'];
		}
		return $cart;
	}



}