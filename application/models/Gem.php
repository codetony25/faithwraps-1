<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gem extends CI_model {
	const TABLE = 'gems';

	use DB_trait;

	public function __construct()
	{
		parent::__construct();
	}

}