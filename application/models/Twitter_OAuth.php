<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter_OAuth extends CI_Model {

	function __construct()
	{
		require_once APPPATH 'libraries/twitteroauth/src/autoload.php';
		use Abraham\TwitterOAuth\TwitterOAuth;

		$this->conn = new TwitterOAuth(
			'OxWYkgHo3O7jPwFIyfu2umDwe',
			'3RNpOlGpgFxLPdeENKVFM8EVnMkIgaHY6g6qrSzC2xrRfXFBcH',
			'260198698-wF3XEphMMBKk1AHl3HkjkGdwCYcnxZgIgMcX880O',
			'k66t66iwA5JRNJJ3GT7KP63EmJA5Y5fezWhTnnyB8z9KV'
		);
	}

}