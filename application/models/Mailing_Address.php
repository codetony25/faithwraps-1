<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailing_Address extends CI_model {
	const TABLE = 'mailing_addresses';

	use DB_trait;

	public function __construct()
	{
		parent::__construct();
	}

}