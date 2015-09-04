<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infos extends CI_controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->template->load('bootstrap', 'infos/info', array(
			'title' => 'FaithWraps Information'
		));		
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
		$this->template->load('bootstrap', 'infos/developers', array(
			'title' => 'Meet the Developers'
		));
	}

	/**
	* Shows the developer page
	*/
	public function about() {
		$this->template->load('bootstrap', 'infos/about', array(
			'title' => 'About Us'
		));
	}

	/**
	* Shows the developer page
	*/
	public function contact() {
		$this->template->load('bootstrap', 'infos/contact', array(
			'title' => 'Contact Us'
		));
	}


}

