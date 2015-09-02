<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing_Address extends CI_model {
	const TABLE = 'billing_addresses';

	use DB_trait;

	public function __construct()
	{
		parent::__construct();
	}

}