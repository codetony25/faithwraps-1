<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/google-api-php-client/src/Google/autoload.php';

class Google_OAuth
{
	var $ci;
	public $client;

	function __construct()
	{
		$this->ci =& get_instance();

		$this->client = new Google_Client();
		$this->ci->config->load('google_api');

		$this->_init();
	}

	private function _init()
	{
		$this->client->setAccessType('offline');
		$this->client->setClientID($this->ci->config->item('client_id'));
		$this->client->setClientSecret($this->ci->config->item('client_secret'));
		$this->client->setRedirectUri($this->ci->config->item('redirect_uri'));
		$this->client->setHostedDomain($this->ci->config->item('hosted_domain'));

		$this->client->setScopes(array(
			Google_Service_Oauth2::USERINFO_EMAIL,
			Google_Service_Oauth2::USERINFO_PROFILE
		));
	}

}