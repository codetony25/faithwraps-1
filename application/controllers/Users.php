<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


	public function __construct() 
	{
		parent::__construct();

		$this->load->model("Product");
	}

	public function index()
	{

		$this->template->load('bootstrap', 'terms', array(
			'title'=>'FaithWraps - Home', 'js_files' => array('/subfolder/ajax.js','')));
	}
}

?>