<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Style extends CI_model {
	const TABLE = 'product_styles';

	use DB_trait;

	public function __construct()
	{
		parent::__construct();
	}

}