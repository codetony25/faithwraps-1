<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stripe_API 
{
	var $ci;

	function __construct() 
	{
		$this->ci =& get_instance();

		$this->_init();
	}

	private function _init()
	{
		$this->ci->config->load('stripe');
		define('STRIPE_PUBLIC_KEY', $this->ci->config->item('test_publishable_key'));
	}

	function charge($data)
	{
		try 
		{
			//Set API Key
			\Stripe\Stripe::setApiKey($this->ci->config->item('test_secret_key'));

			$charge = \Stripe\Charge::create(array(
				'amount' => 500, // in cents
				'currency' => 'usd',
				'source' => $token,
				'description' => 'testing for fw' //send user id
			));
		} 
		catch (\Stripe\Error\Card $e) // Declined charged
		{

		}
		catch (\Stripe\Error\InvalidRequest $e) // Incorrect information sent
		{

		}
		catch (\Stripe\Error\ApiConnection $e) // Network issue. Cannot connect to api
		{

		}
		catch (\Stripe\Error\Api $e) //Problem with Stripe's servers
		{

		}
		catch (\Stripe\Error\Authentication $e) // Invalid API key
		{

		}
		catch (\Stripe\Error\Base $e)
		{

		}
	}
}