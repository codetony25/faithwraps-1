<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'traits/DB_Trait.php';

class Google_OAuth2 extends CI_Model {

	use DB_Trait;

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
}