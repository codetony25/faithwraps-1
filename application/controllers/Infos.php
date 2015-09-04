<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infos extends CI_controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

	}

	/**
	* echos back html data for newsletters ajax call in main.js
	*/
	public function newsletter() {
		echo $this->Info->do_newsletter();
	}

	/**
	* Shows the developer page
	*/
	public function developers() {
		$this->template->load('bootstrap', 'infos/developer', array(
			'title' => 'Meet the Developers'
		));
	}
}

