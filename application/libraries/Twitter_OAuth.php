<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Abraham\TwitterOAuth\TwitterOAuth;

class Twitter_OAuth
{
	var $ci;
	public $client;

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->config->load('twitter');

		$this->_init();
	}

	function _init()
	{
		$this->client = new TwitterOAuth(
			$this->ci->config->item('twitter_consumer_token'),
			$this->ci->config->item('twitter_consumer_secret'),
			$this->ci->config->item('twitter_access_token'),
			$this->ci->config->item('twitter_access_secret')
		);
	}

	/**
	 * Pulls latest tweets via API
	 * 
	 * @param  	int 	$count 	Number of tweets to return. 5 is the default
	 * @return 	mixed 			Array of tweet objects
	 */
	function pull_tweets($count = 5, $user_id = "351181505")
	{
		return $this->client->get('statuses/user_timeline', array(
			'user_id' => $user_id, 
			'count' => $count,
			'exclude_replies' => TRUE,
			'include_rts' => FALSE
		));
	}

	function makeClickableLinks($tweet) {
		return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a rel="nofollow" href="$1" target="_blank">$1</a>', $tweet);
	}
}