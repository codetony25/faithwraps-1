<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_model {

	const TABLE = 'users';

	function __construct() 
	{
		parent::__construct();
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
		$this->db->where('email', $post['email']);
		$user = $this->db->get(self::TABLE)->row_array();

		if (password_verify($post['password'], $user['password']))
			return $user;
		else
			return FALSE;
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


	public function gauth($code)
	{

		$this->Google->setAccessToken( $this->Google->getAccessToken() );

		$auth = new Google_Service_Oauth2( $this->Google );

		var_dump($auth->userinfo_v2_me->get());
	}
}