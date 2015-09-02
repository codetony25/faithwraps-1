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
	}

	public function index() {
		$this->template->load('bootstrap', 'admin/dashboard', array('title'=>'Admin Dashboard', 'js_files' => array('ajax.js')));
	}

	public function is_admin() {
		return ($this->session->userdata('level') == 5);
	}

	public function make_form($form_scope, $id) {
		$data = $this->Admin->create_form($form_scope, $id);
			echo $this->load->view('admin/partials/edit_' . $form_scope . '_form', $data, TRUE);
	}

	/****************
	* JSON Response functions
	****/

	public function control_edit($form_scope) {
	// Calls on the model to edit/insert a product and returns a JSON response
		echo json_encode($this->Admin->do_edit($form_scope, $this->input->post()));
	}

	public function control_delete($form_scope, $id) {
	// Calls on the Admin model to delete a product and returns a json response
		echo json_encode($this->Admin->delete_item($form_scope, $id));
	}

	public function control_get($table, $field = "", $value = "", $limit = FALSE) {
	// Calls on the Admin model to fetch items
		echo json_encode($this->Admin->admin_get($table, $field, $value, $limit));
	}

	public function control_get_orders() {
	// Calls on the Orders model to get all orders and combine them with
	// Order parts, users, and all addresses.
		echo json_encode($this->Order->get_all_orders());
	}
}
