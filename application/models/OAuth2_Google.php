<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'traits/DB_Trait.php';

class OAuth2_Google extends CI_Model {

	use DB_Trait;

	const TABLE = 'oauth_users';
	const OAUTH_TYPE = 1;

	/**
	 * @param 	array 	$user 	Array containing data retrieved from user's Google account
	 * @return 	int 			Returns row ID after table insertion
	 */
	function create_account($user)
	{
		$this->db->set('created_at', 'NOW()', FALSE);

		$verified_email = $user['verifiedEmail'] ? '1' : '0';

		$data = array(
			'email' => $user['email'],
			'verified_email' => $verified_email,
			'first_name' => $user['givenName'],
			'last_name' => $user['family_name'],
			'picture' => $user['picture'],
			'oauth_id' => $user['id'],
			'oauth_type_id' => self::OAUTH_TYPE
		);

		$this->db->insert(self::TABLE, $data);

		return $this->db->insert_id();
	}

	function generate_state()
	{
		return sha1(openssl_random_pseudo_bytes(1024));
	}
}