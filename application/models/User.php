<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_model {

	const TABLE = 'users';

	function __construct() 
	{
		parent::__construct();
		// $this->load->library('email');
	}

	function fetch_user($user_id)
	{
		return $this->get_where(self::TABLE, array('id' => $user_id), 1)->row_array();
	}

	function validate_registration()
	{
		if ($this->form_validation->run('register') == FALSE)
			return validation_errors();
		else
			return TRUE;
	}

	function validate_login()
	{
		if ($this->form_validation->run('login') == FALSE)
			return validation_errors();
		else
			return TRUE;
	}

	function verify_login($post)
	{
		$this->db->set('email', $post['email']);
		$this->db->set('password', password_hash($post['email'], PASSWORD_DEFAULT));

		return $this->db->get(self::TABLE)->row_array();
	}
	
	/**
	 * 
	 */
	function create_user($post)
	{
		$this->db->set('email', $post['email']);
		$this->db->set('password', password_hash($post['password'], PASSWORD_DEFAULT));
		$this->db->set('created_at', 'NOW()', FALSE);
		$this->db->set('confirmation_code', md5(uniqid(rand())));

		$this->db->insert(self::TABLE);

		return $this->db->insert_id();
	}

	function confirm($code)
	{
		if ($result = $this->db->get_where(self::TABLE, array('confirmation_code' => $code), 1)->row_array())
			return $result;
		else
			return FALSE;
	}

	function activate($code)
	{
		$this->db->set('updated_at', 'NOW()', FALSE);
		$this->db->set('is_active', '1');
		$this->db->set('confirmation_code', NULL);
		$this->db->where('confirmation_code', $code);
		$this->db->limit(1);

		return $this->db->update(self::TABLE);
	}

	/**
	 * 
	 */
	function send_verification_email($user_id)
	{
		$this->db->select('first_name, email, confirmation_code');
		$user = $this->db->get_where(self::TABLE, array('id' => $user_id), 1)->row_array();

		$this->load->library('email');

		$this->email->from('admin@website.com', 'Admin');
		$this->email->to($user['email']);

		$this->email->subject('Please verify your account');
		$this->email->message('Testing');

		return $this->email->send();
	}
}