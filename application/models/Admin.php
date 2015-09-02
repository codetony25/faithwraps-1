<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_model {

	public function __construct() {
		parent::__construct();
	}

	/**************** CRUD FUNCTIONS ********************/

	public function admin_get($table, $field = "", $value = "", $limit = FALSE) {
		if 	($table == "products") { $model = "Product"; }
		elseif 	($table == "product_styles") { $model = "Product_Style"; }
		elseif 	($table == "gems") { $model = "Gem"; }
		elseif 	(($table == "galleries") || ($table == "categories")) { $model = "Category"; }
		elseif ($table == "orders") { $model = "Order"; }
		
		if (isset($model)) {
			if (($field) && ($value)) {
				return ($limit) ? $this->$model->fetch(array($field=>$value))
				 				: $this->$model->fetch_all_where(array($field=>$value));
			} else {
				return $this->$model->fetch_all();
			}
		} else {
			return FALSE;
		}
	}

	public function update_item($table, $post) {
		foreach ($post as $key => $val) {
			if (!$this->db->field_exists($key, $table)) {
				unset($post[$key]);
			}
		}
		$this->db->where('id', $post['id']);
		$this->db->update($table, $post);
		return $this->db->affected_rows();
	}

	public function create_item($table, $post) {
		foreach ($post as $key => $val) {
			if (!$this->db->field_exists($key, $table)) {
				unset($post[$key]);
			}
		}

		return ($this->db->insert($table, $post)) ? $this->db->insert_id() : FALSE;		
	}

	public function delete_item($table, $id) {
		$json = array('success' => FALSE, 'message' => 'Problem deleting.');
		$this->db->where('id', $id);
		$this->db->delete($table);
		if ($this->db->affected_rows()) {
			$json['success'] = TRUE;
			$json['message'] = "Item has been deleted.";		
		} 
		return $json;
	}

	/**************** EDITING ***************************/

	public function do_edit($form_scope, $post) {
		$json = array('success' => FALSE, 'message' => '');
	
		if ($post['action'] == 'update') {
			if ($this->update_item($form_scope, $post)) {
				$json['success'] = TRUE;
				$json['message'] = "Item in {$form_scope} has been updated.";
			} else {
				$json['message'] = "Problem updating {$form_scope}.";
			}
		}
		elseif ($post['action'] == 'create') {
			if ($this->create_item($form_scope, $post))	{
				$json['success'] = TRUE;
				$json['message'] = "New item in {$form_scope} created.";
			} else {
				$json['message'] = "Problem creating item in {$form_scope}.";
			}	
		}

		return $json;
	}

	/**************** FORM BUILDING *********************/
	public function create_form($form_scope, $id) {
		
		// Products Form
		if ($form_scope == "products") {
			if (($id == "add") || (!$this->admin_get('products', 'id', $id))) {
				$product = array('name' => 'Needs a Name',
					'desc' => 'Needs a Description',
					'price' => '35.00',
					'shipping' => '3.99',
					'qty' => '5',
					'combined_shipping' => '1.00');
				$data = array('is_new' => TRUE, 'product' => $product);
			} else {
				$data = array('is_new' => FALSE, 'product' => $this->admin_get('products','id', $id, TRUE));
			}
			$data['galleries'] = $this->admin_get('galleries');
			$data['gems'] = $this->admin_get('gems');
			return $data;
		}
		// Gems Form
		elseif ($form_scope == "gems") {
			if (($id == "add") || (!$this->admin_get('gems', 'id', $id))) {
				$gem = array('name' => 'Needs a Name',
					'desc' => 'Needs a Description',
					'colors' => 'List colors comma separated',
					'energies' => 'List energies comma separated',
					'chakras' => 'List chakras comma separated');
				$data = array('is_new' => TRUE,
					'gem' => $gem);
			} else {
				$data = array('is_new' => FALSE,
					'gem' => $this->admin_get('gems','id', $id, TRUE));
			}
			return $data;
		}
		// Product Styles Inner Form
		elseif ($form_scope == "product_styles") {
			if (($id == "add") || (!$this->admin_get('product_styles', 'id', $id))) {
				$product_style = array('name' => 'Needs a Name',
					'image' => 'default.jpg');
				$data = array('is_new' => TRUE, 'product_style' => $product_style);
			} else {
				$data = array('is_new' => FALSE, 'product_style' => $this->admin_get('product_styles','id', $id, TRUE));
			}
			return $data;
		}
		// Galleries aka Categories
		elseif ($form_scope == "galleries") {
			if (($id == "add") || (!$this->admin_get($form_scope, 'id', $id))) {
				$gallery = array('name' => 'Needs a Name',
					'desc' => 'Needs a Desc');
				$data = array('is_new' => TRUE,
					'gallery' => $gallery);
			} else {
				$data = array('is_new' => FALSE,
					'gallery' => $this->admin_get($form_scope,'id', $id));
			}
			return $data;
		}
	}
}
