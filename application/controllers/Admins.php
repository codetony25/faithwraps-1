<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {


	public function __construct() 
	{
		parent::__construct();

		//No one other than admins should be here
		// if (!is_admin()) {
		// 	redirect('/');
		// }

		// Eventually move all model loads to autload config
		$this->load->model('Product');
		$this->load->model('Admin');
	}

	public function index() {
		$product_data = $this->Product->get_all_products();
		$this->template->load('bootstrap', 'admin/dashboard', array('title'=>'Admin Dashboard', 'products' => $product_data));
	}

	public function is_admin() {
		return ($this->session->userdata('level') == 5);
	}

	public function get_admin($table) {
		echo json_encode($this->Admin->get_all_admin($table));
	}

	public function product_form($id) {
		if (($id == "add") || (!$this->Product->get_product_by('id', $id))) {
			$product = array('name' => 'Needs a Name',
							 'desc' => 'Needs a Description',
							 'price' => '35.00',
							 'shipping' => '3.99',
							 'combined_shipping' => '1.00');
			$data = array('is_new' => TRUE,
						  'product' => $product,
						  'galleries' => $this->Product->get_all_galleries(),
						  'gems' => $this->Product->get_all_gems('gems'));

		} else {
			$data = array('is_new' => FALSE,
						  'product' => $this->Product->get_product_by('id', $id),
						  'galleries' => $this->Product->get_all_galleries(),
						  'gems' => $this->Product->get_all_gems('gems'));
		}
	
		echo $this->load->view('admin/partials/product_form', $data, TRUE);
	}

	public function edit_product() {
	// Calls on the model to edit/insert a product and returns a JSON response
		$json = array('success' => FALSE, 'message' => '');
		// For updating the product
		if ($this->input->post('action') == 'update') {
			if ($this->Admin->update_product($this->input->post()))	{
				$json['success'] = TRUE;
				$json['message'] = "Product has been updated.";
			} else {
				$json['message'] = "Problem updating the product.";
			}
		}
		// For creating the product
		elseif ($this->input->post('action') == 'create') {
			if ($this->Admin->create_product($this->input->post())) {
				$json['success'] = TRUE;
				$json['message'] = "Product has been created.";				
			} else {
				$json['message'] = "Problem creating the product.";
			}
		}
		echo json_encode($json);
	}

	public function delete_product($id) {
	// Calls on the Admin model to delete a product and returns a json response
		$json = array('success' => FALSE, 'message' => 'Problem deleting product.');
		if ($this->Admin->delete_product($id)) {
			$json['success'] = TRUE;
			$json['message'] = "Product has been deleted.";		
		}
		echo json_encode($json);
	}
}
