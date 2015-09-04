<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing_Address extends CI_model {
	const TABLE = 'billing_addresses';

	use DB_trait;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_billing() {
		$user = $this->session->userdata('user');

		return $this->fetch(array('user_id'=>$user['id']));
	}

	/**
	* Updates a user's shipping information if they already have an id in shipping	
	* Otherwise, inserts a new row with the user's shipping information
	*
	* @param 	array 	$post 	Information from shipping form
	*/
	public function save_billing($post) {
		$user = $this->session->userdata('user');
		// Grab only the data that belongs in the shipping table
		$data['address'] = $post['address'];
		$data['address_2'] = $post['address_2'];
		$data['city'] = $post['city'];
		$data['state'] = $post['state'];
		$data['country'] = $post['country'];
		$data['zip_code'] = $post['zip_code'];

		// If a record already exists, update it
		if ($userMailing = $this->fetch(array('user_id'=>$user['id']))) {
			$this->db->where(array('user_id',$user['id']));
			$this->db->update(self::TABLE, $data);
		} else {
			$data['user_id'] = $user['id'];
			$this->db->insert(self::TABLE, $data);
		}

	}

}
