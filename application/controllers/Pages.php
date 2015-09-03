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
		// Grab tweets from DB
		$tweets = $this->Twitter->fetch_all();

		if (! $tweets || $this->Twitter->need_update($tweets[0]))
		{
			//grab via api
			$tweets = $this->tauth->pull_tweets();

			$this->Twitter->empty_table();

			//insert new tweets into db
			$this->Twitter->multi_insert($tweets);
		}

		// grab tweets again from DB. Expected return from DB to be used in next step
		$tweets = $this->Twitter->fetch_all();

		array_walk( $tweets, function(&$tweet, $key) {
			$tweet['message'] = $this->tauth->makeClickableLinks($tweet['message']);
		});

		$twitter_partial = $this->load->view('partials/twitter_feed', array('tweets' => $tweets), TRUE);

		$this->template->load('bootstrap', 'index', array(
			'title' => 'Faith Wraps',
			'products' => $this->Page->get_random_products(10),
			'home_page' => TRUE,
			'twitter_feed' => $twitter_partial
		));
	}
}