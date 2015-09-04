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
			'title' => 'FaithWraps',
			'mason_grid' => $mason_partial,
			'home_page' => TRUE,
			'twitter_feed' => $twitter_partial
		));
	}

	function stripe()
	{
		$this->config->load('stripe');

		define('STRIPE_PUBLIC_KEY', $this->config->item('test_publishable_key'));

		$this->template->load('bootstrap', 'billing', array(
			'title' => 'stripe test'
		));
	}

	function process()
	{
		$feedback = [];
		$this->config->load('stripe');

		if ($token = $this->input->post('stripeToken'))
		{
			// To be used later to verify token has not already been used
			$this->session->set_userdata('stripe_token', $token);

			try 
			{
				//Set API Key
				\Stripe\Stripe::setApiKey($this->config->item('test_secret_key'));

				$charge = \Stripe\Charge::create(array(
					'amount' => 500, // in cents
					'currency' => 'usd',
					'source' => $token,
					'description' => 'testing for fw'
				));
			} 
			catch (\Stripe\Error\Card $e)
			{

			}

			var_dump($charge); die();
			
		}
		else
		{
			$feedback[] = 'The order could not be processed. You have not been charged. Please confirm that you have JavaScript enabled and try again.';
		}
	}
}