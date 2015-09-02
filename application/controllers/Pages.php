<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->template->load('bootstrap', 'index', array(
			'title' => 'Faith Wraps'
		));
	}
}