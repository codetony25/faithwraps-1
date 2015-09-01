<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_model {

	public function get_all_admin($table) {
		// Takes in a table as paremeter and returns all data to be parsed as
		// JSON to be used in the admin dashboard.

		return $this->db->get($table)->result_array();
	}

	public function update_product($post) {
		$data['name'] = $post['name'];
		$data['desc'] = $post['desc'];
		$data['gallery_id'] = $post['gallery_id'];
		$data['gem_id'] = $post['gem_id'];
		$data['price'] = $post['price'];
		$data['shipping'] = $post['shipping'];
		$data['combined_shipping'] = $post['combined_shipping'];

		$this->db->where('id', $post['id']);
		return $this->db->update('products', $data);
	}

	public function create_product($post) {
		$data['name'] = $post['name'];
		$data['desc'] = $post['desc'];
		$data['gallery_id'] = $post['gallery_id'];
		$data['gem_id'] = $post['gem_id'];
		$data['price'] = $post['price'];
		$data['shipping'] = $post['shipping'];
		$data['combined_shipping'] = $post['combined_shipping'];

		return ($this->db->insert('products', $data)) ? $this->db->insert_id() : FALSE;
	}

	public function delete_product($id) {
		$this->db->where('id', $id);
		return ($this->db->delete('products'));
	}
}

