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

	function charge($token, $billing_info, $cart, $user)
	{
		$data = $this->_form_data($post);

		$data['amount'] = $cart['total'] * 100;  //amount is in cents
		$data['source'] = $token;
		$data['description'] = $user['email'];

		try 
		{
			//Set API Key
			\Stripe\Stripe::setApiKey($this->ci->config->item('test_secret_key'));

			$charge = \Stripe\Charge::create($data);

			return $charge;
		} 
		catch (\Stripe\Error\Card $e) // Declined charged
		{
			return $e->getJsonBody();
		}
		catch (\Stripe\Error\InvalidRequest $e) // Incorrect information sent
		{
			return $e->getJsonBody();
		}
		catch (\Stripe\Error\ApiConnection $e) // Network issue. Cannot connect to api
		{
			return $e->getJsonBody();
		}
		catch (\Stripe\Error\Api $e) //Problem with Stripe's servers
		{
			return $e->getJsonBody();
		}
		catch (\Stripe\Error\Authentication $e) // Invalid API key
		{
			return $e->getJsonBody();
		}
		catch (\Stripe\Error\Base $e)
		{
			return $e->getJsonBody();
		}

		
	}

	private function _form_data($billing_info)
	{
		$data = array( 
			'currency' => 'usd',
			'metadata' => array(
				'Address_1' => $post['address_1'],
				'Address_2' => $post['address_2'],
				'City' => $post['city'],
				'State' => $post['state'],
				'Zip_Code' => $post['zip_code']
			)
		);

		return $data;
	}
}