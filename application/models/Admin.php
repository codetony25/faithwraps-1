<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_model {

	/**************** CRUD FUNCTIONS ********************/

	public function get_by($table, $field, $value) {
		$this->db->where($field, $value);
		return $this->db->get($table)->result_array();
	}

	public function get_all_items($table) {
		// Takes in a table as paremeter and returns all data to be parsed as
		// JSON to be used in the admin dashboard.

		return $this->db->get($table)->result_array();
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
		if ($form_scope == "products") {
			if (($id == "add") || (!$this->get_by('products', 'id', $id))) {
				$product = array('name' => 'Needs a Name',
					'desc' => 'Needs a Description',
					'price' => '35.00',
					'shipping' => '3.99',
					'qty' => '5',
					'combined_shipping' => '1.00');
				$data = array('is_new' => TRUE,
					'product' => $product,
					'galleries' => $this->Product->get_all_galleries(),
					'gems' => $this->Product->get_all_gems('gems'));

			} else {
				$data = array('is_new' => FALSE,
					'product' => $this->Product->get_by('products','id', $id),
					'galleries' => $this->Product->get_all_galleries(),
					'gems' => $this->Product->get_all_gems('gems'));
			}
			return $data;
		}
		elseif ($form_scope == "gems") {
			if (($id == "add") || (!$this->Product->get_by('gems', 'id', $id))) {
				$gem = array('name' => 'Needs a Name',
					'desc' => 'Needs a Description',
					'colors' => 'List colors comma separated',
					'energies' => 'List energies comma separated',
					'chakras' => 'List chakras comma separated');
				$data = array('is_new' => TRUE,
					'gem' => $gem);
			} else {
				$data = array('is_new' => FALSE,
					'gem' => $this->get_by('gems','id', $id));
			}
			return $data;
		}
		elseif ($form_scope == "product_styles") {
			if (($id == "add") || (!$this->get_by($form_scope, 'id', $id))) {
				$product_style = array('name' => 'Needs a Name',
					'image' => '');
				$data = array('is_new' => TRUE,
					'product_style' => $product_style,
					'products' => $this->Product->get_all_products());
			} else {
				$data = array('is_new' => FALSE,
					'product_style' => $this->get_by($form_scope,'id', $id),
					'products' => $this->Product->get_all_products());
			}
			return $data;
		}
		elseif ($form_scope == "galleries") {
			if (($id == "add") || (!$this->get_by($form_scope, 'id', $id))) {
				$gallery = array('name' => 'Needs a Name',
					'desc' => 'Needs a Desc');
				$data = array('is_new' => TRUE,
					'gallery' => $gallery);
			} else {
				$data = array('is_new' => FALSE,
					'gallery' => $this->get_by($form_scope,'id', $id));
			}
			return $data;
		}
	}
}
