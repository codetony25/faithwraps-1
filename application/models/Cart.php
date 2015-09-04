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
		$user = $this->session->userdata('user');

		$product_table = Product::TABLE;
		$product_style_table = Product_Style::TABLE;
		$cart_table = self::TABLE;

		if ($user['id']) {
			// Get the product with the product style
			$this->db->select("$cart_table.id, $cart_table.product_id as product_id, $cart_table.product_style_id as product_style_id, $cart_table.qty, $product_table.name as product_name, $product_style_table.name as product_style_name, $product_style_table.image, $product_table.price as product_price, $product_table.shipping as shipping");
			$this->db->join($product_style_table, "$product_style_table.id = $cart_table.product_style_id");
			$this->db->join($product_table, "$product_table.id = $product_style_table.product_id");
			$cart['items'] = $this->fetch_all_where(array($cart_table.'.user_id'=>$user['id']));
		} else {
			// For users not logged in
			if (!$cart = $this->session->userdata('cart')) {
				// If there's no cart, create an empty cart to send back
				$cart['items'] = [];
				$cart['total'] = 0;
			} else {
				// Build out all the proper indexes for each item
				foreach($cart['items'] as $key=>$item) {
					$product_style_id = $item['product_style_id'];
					$product_id = $item['product_id'];
					$this->db->select("$product_table.name as product_name, $product_style_table.name as product_style_name, $product_style_table.image, $product_table.price as product_price, $product_table.shipping as shipping");
					$this->db->join($product_style_table, "$product_style_table.id = $product_style_id");
					$cart['items'][$key] = $this->Product->fetch(array($product_table.'.id'=>$product_id));
					$cart['items'][$key]['qty'] = $item['qty'];
				}
			}
		}

		$cart['total'] = 0;
		foreach($cart['items'] as $item) {
			$cart['total'] += $item['product_price'] * $item['qty'];
		}
		
		return $cart;
	}

	/**
	*	Adds an item to the carts table for logged in users	
	*/
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
			// Start building the new cart item
			$new_cart_item['user_id'] = $user['id'];
			$new_cart_item['product_id'] = $product['product_id'];
			$new_cart_item['product_style_id'] = $product['product_style_id'];

			// If the product already exists in the users cart, update the qty
			$this->db->select("id, qty");
			if ($update = $this->fetch($new_cart_item)) {
				// Make sure the qty being added isn't greater than the max available
				$new_cart_item['qty'] = $post['product_qty'] + $update['qty'];
				$new_cart_item['qty'] = ($new_cart_item['qty'] > $product['max_qty']) ? $product['max_qty'] : $new_cart_item['qty'];
				// Update the cart
				$this->db->where(array('user_id'=>$user['id'], 'product_style_id'=>$new_cart_item['product_style_id']));
				$this->db->update(self::TABLE, array('qty'=>$new_cart_item['qty']));
			} else {
				// Make sure the qty being added isn't greater than the max available
				$new_cart_item['qty'] = $post['product_qty'];				
				$new_cart_item['qty'] = ($new_cart_item['qty'] > $product['max_qty']) ? $product['max_qty'] : $new_cart_item['qty'];
				// Add the item to the cart, then validate the cart
				$this->db->insert(self::TABLE, $new_cart_item);
			}
		}

	}

	/**
	* Adds an item to the carts session for users not logged in	
	*
	* @param 	array 	$post 	Information from buy button/product form
	*/	
	public function add_item_session($post) {
		$product_table = Product::TABLE;
		$product_style_table = Product_Style::TABLE;
		// If no cart in session, create an empty cart
		if (!$cart = $this->session->userdata('cart')) {
			$cart['items'] = [];
		}

		// DO FORM VALIDATION
		if ($post['product_qty'] <= 0) {
			return false;
		}

		// Get the product with the product style
		$this->db->select("$product_table.id as product_id, $product_style_table.id as product_style_id, $product_table.qty as max_qty");
		$this->db->join($product_table, "$product_style_table.product_id = $product_table.id");
		$product = $this->Product_Style->fetch(array($product_style_table.'.id'=>$post['product_style']));

		$new_cart_item['product_id'] = $product['product_id'];
		$new_cart_item['product_style_id'] = $product['product_style_id'];
		$new_cart_item['qty'] = $post['product_qty'];

		// NEED TO GROUP LIKE PRODUCT STYLES

		array_push($cart['items'], $new_cart_item);
		$this->session->set_userdata('cart', $cart);
	}

	/**
	 * Merges a sessioned cart with a logged in user's cart and stores it
	 * in the databse.
	 */
	public function combine_carts() {
		$user = $this->session->userdata('user');

		$product_table = Product::TABLE;
		$product_style_table = Product_Style::TABLE;
		$cart_table = self::TABLE;		

		// Get all the session cart items
		if (!$cart_sess = $this->session->userdata('cart')) {
			// No cart in the session so leave everthing as is
			return;
		}

		// Get all the logged in users items
		$this->db->select('product_style_id,product_id,qty');
		$cart_db = $this->fetch(array('id'=>$user['id']));

		/***************** MERGE TOGETHER *****************/
		$new_db = [];

		if (count($cart_db['items'])) {
			foreach ($cart_db['items'] as $prod) {
				$key = $prod['product_style_id'];
				if (isset($new_db[$key])) {
					$new_db[$key]['qty'] += $prod['qty'];
				} else {
					$new_db[$key] = $prod;
				}
			}

			// Delete all the items in the carts table for this user
			$this->db->delete('carts',array('user_id'=>$user['id']));
		}

		foreach ($cart_sess['items'] as $prod) {
			$key = $prod['product_style_id'];
			if (isset($new_db[$key])) {
				$new_db[$key]['qty'] += $prod['qty'];
			} else {
				$new_db[$key] = $prod;
			}
		}
		/******* END MERGE *******************/

		// Re-enter to the database
		foreach ($new_db as $item) {
			$item['user_id'] = $user['id'];
			$this->db->insert(self::TABLE, $item);
		}
	}

}