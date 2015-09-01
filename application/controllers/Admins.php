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
		$this->template->load('bootstrap', 'admin/dashboard', array('title'=>'Admin Dashboard', 'js_files' => array('ajax.js')));
	}

	public function is_admin() {
		return ($this->session->userdata('level') == 5);
	}

	public function get_admin($table) {
		echo json_encode($this->Admin->get_all_items($table));
	}

	public function make_form($form_scope, $id) {
		$data = $this->Admin->create_form($form_scope, $id);
		echo $this->load->view('admin/partials/edit_' . $form_scope . '_form', $data, TRUE);
	}

	public function control_edit($form_scope) {
	// Calls on the model to edit/insert a product and returns a JSON response
		$json = $this->Admin->do_edit($form_scope, $this->input->post());
		echo json_encode($json);
	}

	public function control_delete($form_scope, $id) {
	// Calls on the Admin model to delete a product and returns a json response
		$json = $this->Admin->delete_item($form_scope, $id);
		echo json_encode($json);
	}
}
