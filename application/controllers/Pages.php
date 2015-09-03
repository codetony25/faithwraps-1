<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Twitter');
		$this->load->library('Twitter_OAuth', '', 'tauth');
	}

	/**
	 * Displays site index
	 */
	function index()
	{
		$twitter_partial = $this->load->view('partials/twitter_feed', array(
			'tweets' => $this->Page->get_tweets()),
			 TRUE
		);

		$mason_partial = $this->load->view('partials/products_mason_grid', array(
			'products' => $this->Page->get_random_products(10)),
			TRUE
		);

		$this->template->load('bootstrap', 'index', array(
			'title' => 'Faith Wraps',
			'mason_grid' => $mason_partial,
			'home_page' => TRUE,
			'twitter_feed' => $twitter_partial
		));
	}
}