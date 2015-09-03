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
		$this->config->load('stripe');
	}
}