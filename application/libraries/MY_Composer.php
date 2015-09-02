<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Composer 
{
	/**
	 * Class constructor.  Set up here to autoload composer autoload file
	 */
	function __construct()
	{
		include('./vendor/autoload.php');
	}
}