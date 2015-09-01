<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_OAuth2 extends CI_Model{

	const TABLE = 'oauth_users';
	const OAUTH_TYPE = 1;

	function __construct()
	{
		require_once APPPATH . 'libraries/google-api-php-client/src/Google/autoload.php';

		$this->client = new Google_Client();

		$this->client->setAuthConfigFile(APPPATH . 'config/google_api_key.json');
		$this->client->setScopes(array(
			Google_Service_Oauth2::USERINFO_EMAIL,
			Google_Service_Oauth2::USERINFO_PROFILE
		));
	}

	function get_auth_url()
	{
		return $this->client->createAuthUrl();
	}

	function fetch_account($id)
	{
		return $this->db->get_where(self::TABLE, array('oauth_id' => $id))->row_array();
	}

	function create_account($user)
	{
		$this->db->set('created_at', 'NOW()', FALSE);

		$data = array(
			'email' => $user['email'],
			'verified_email' => $user['verifiedEmail'],
			'first_name' => $user['givenName'],
			'last_name' => $user['family_name'],
			'picture' => $user['picture'],
			'oauth_type_id' => self::OAUTH_TYPE
		);

		$this->db->insert(self::TABLE, $data);

		return $this->db->insert_id();
	}
}