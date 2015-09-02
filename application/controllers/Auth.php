<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_controller 
{
	/**
	 * @access 	public
	 * @param 	string 		$provider 		
	 */
	function session($provider)
	{
		$provider = strtolower($provider);

		switch ($provider)
		{
			case 'google':
				$provider = $this->get_provider_google();
				break;
		}

		echo "HERE";
	}

	function get_provider_google()
	{
		$this->config->load('google_api');

		$provider = new League\OAuth2\Client\Provider\Google([
			'clientId' => $this->config->item('client_id'),
			'clientSecret' => $this->config->item('client_secret'),
			'redirectUri' => $this->config->item('redirect_uri'),
			'hostedDomain' => $this->config->item('hosted_domain')
		]);

		return $provider;
	}
}