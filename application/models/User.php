<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'traits/DB_Trait.php';

class User extends CI_model {

	use DB_Trait;

	const TABLE = 'users';
	const RESET_TABLE = 'password_resets';

	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set('America/Los_Angeles');
	}

	/**
	 * Verify credentials entered by user for local account login.
	 * 
	 * Email Password combination must match, and user must have confirmed.
	 * 
	 * @param 	array 	$post 	Information from login form
	 * @return 	mixed 			On successful verification, return array of $user data
	 * 							On failure, return FALSE
	 */
	function verify_login($post)
	{
		$this->db->where('email', $post['email']);
		$user = $this->db->get(self::TABLE)->row_array();

		if (password_verify($post['password'], $user['password']) && $user['is_confirmed'])
			return $user;
		else
			return FALSE;
	}

	/**
	 * Inserts data into users table to create a new account. Confirmation token is generated at this point
	 * 
	 * @param 	array 	$post 	Information from login form
	 * @return 	int 			Returns last row ID from users table
	 */
	function create_user($post)
	{
		$this->db->set('email', $post['email']);
		$this->db->set('password', password_hash($post['password'], PASSWORD_DEFAULT));
		$this->db->set('created_at', 'NOW()', FALSE);
		$this->db->set('confirmation_code', $this->_generate_token());

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
		$this->db->set('is_confirmed', '1');
		$this->db->set('confirmation_code', NULL);
		$this->db->where('confirmation_code', $code);
		$this->db->limit(1);

		$this->db->update(self::TABLE);

		return $this->db->affected_rows();
	}

	/**
	 * 
	 */
	function send_verification_email($user_id)
	{
		$this->load->library('email');

		$this->db->select('first_name, email, confirmation_code');
		$user = $this->db->get_where(self::TABLE, array('id' => $user_id), 1)->row_array();

		$this->email->from('andrew.a.lee@gmail.com', 'andrew');
		$this->email->to($user['email']);

		$this->email->subject('Please verify your account');
		$this->email->message("<a href='/users/confirm/{$user['confirmation_code']}'>Confirm</a>");

		// return $this->email->send();
	}

	function send_password_reset_email($token, $data)
	{
		$this->load->library('email');

		$this->email->from('andrew.a.lee@gmail.com', 'andrew');
		$this->email->to($data['email']);

		$this->email->subject("Reset your password");
		$this->email->message("<a href='/password_reset/$token>'>Reset my password</a>");

		return $this->email->send();
	}

	/**
	 * 
	 */
	function send_reset_email($data)
	{
		$token = $this->_generate_token();

		$this->_record_reset_token($token, $data);

		return $this->send_password_reset_email($token, $data);
	}
	

	function reset_password($data)
	{
		$token = $data['token'];
		$new_password = $data['password'];

		$row = $this->db->get_where(self::RESET_TABLE, array('token' => $token), 1)->row_array();

		if ($row && time() <= strtotime($row['expiry']))
		{
			$this->db->set('updated_at', 'NOW()', FALSE);
			$this->db->set('password', password_hash($new_password, PASSWORD_DEFAULT));
			$this->db->where('id', $row['user_id']);
			$this->db->update(self::TABLE);

			return $this->db->affected_rows();
		}

		return FALSE;
	}

	protected function _record_reset_token($token, $data)
	{
		$insert = array(
			'user_id' => $data['id'],
			'token' => $token
		);

		$this->db->set('expiry', 'DATE_ADD(NOW(), INTERVAL 1 HOUR)', FALSE);

		$this->db->insert(self::RESET_TABLE, $insert);

		return $this->db->insert_id();
	}

	protected function _generate_token()
	{
		return md5(uniqid(rand()));
	}
}