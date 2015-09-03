<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Twitter');
	}

	/**
	 * Displays site index
	 */
	function index()
	{
		// Grab tweets from DB
		// $tweets = $this->



		$twitter_feed = $this->load->view('partials/twitter_feed', '', TRUE);

		$this->template->load('bootstrap', 'index', array(
			'title' => 'Faith Wraps',
			'products' => $this->Page->get_random_products(10),
			'home_page' => TRUE,
			'twitter_feed' => $twitter_feed
		));
	}
}