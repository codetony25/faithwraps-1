<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Inserts a users email into the database for newsletters
	 * 
	 * @return 	string 			Success or failure string
	 */
	public function do_newsletter() {

		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run('newsletter')) {
			$data['email'] = $this->input->post('email');
			if ($this->db->insert('newsletters', $data)) {
				return "Thank you for signing up!";			
			} else {
				return "Can't complete subscription at this time.";
			}
		}
		return validation_errors();

	}

}
