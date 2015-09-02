<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Part extends CI_model {
	const TABLE = 'order_parts';

	use DB_trait;

	public function __construct()
	{
		parent::__construct();
	}

}