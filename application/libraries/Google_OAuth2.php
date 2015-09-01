<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_OAuth2 {

	const TABLE = 'oauth_users';
	const OAUTH_TYPE = 1;

	var $ci;

	function __construct()
	{
		$this->ci =& get_instance();

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


	function login($user)
	{

	}

	function account_exists($id)
	{
		return $this->db->get_where(self::TABLE, array('oauth_id' => $id))->row_array();
	}
}