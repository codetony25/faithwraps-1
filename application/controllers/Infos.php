<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infos extends CI_controller {

	public function __construct() {
		parent::__construct();
	}

	public function newsletter() {
		echo $this->Info->do_newsletter();
	}
}

