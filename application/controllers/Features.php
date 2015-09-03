<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Features extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Twitter');
		$this->load->library('Twitter_OAuth', '', 'tl');
	}

	function index()
	{
		$this->template->load('bootstrap', 'partials/twitter_feed', array(
			'title' => 'Twitter Dev'
		));
	}

}