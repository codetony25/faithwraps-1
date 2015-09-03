<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Abraham\TwitterOAuth\TwitterOAuth;

class Twitter_OAuth extends CI_Model {

	const TABLE = 'tweets';

	function __construct()
	{
		require_once APPPATH . 'libraries/twitteroauth/autoload.php';

		$this->_init();

		$this->conn = new TwitterOAuth(
			'OxWYkgHo3O7jPwFIyfu2umDwe',
			'3RNpOlGpgFxLPdeENKVFM8EVnMkIgaHY6g6qrSzC2xrRfXFBcH',
			'260198698-wF3XEphMMBKk1AHl3HkjkGdwCYcnxZgIgMcX880O',
			'k66t66iwA5JRNJJ3GT7KP63EmJA5Y5fezWhTnnyB8z9KV'
		);
	}

	/**
	 * Initialize settings for the class
	 */
	protected function _init()
	{
		// How often to check for tweets via the api.
		$this->interval = 600;
	}

	/**
	 * Returns all tweets from the tweets table
	 * 
	 * @return 	array 			Array containing tweets from the database
	 */
	function fetch_all()
	{
		return $this->db->get(self::TABLE)->result_array();
	}

	/**
	 * Retrieves one record from database
	 * 
	 * @param 	array 	$data 	Key => value pair representing table colum => table to seach by
	 * @return 	array 			Returns an array containing the result
	 */
	function fetch(array $data)
	{
		return $this->db->get_where(self::TABLE, $data)->row_array();
	}

	/**
	 * Insert tweets into the database. 
	 * 
	 * @param 	mixed 	$data 	
	 */
	function multi_insert(array $data)
	{
		foreach( $data as $tweet )
		{
			$this->db->set('time_checked', 'NOW()', FALSE);
			$this->db->insert( self::TABLE, array(
				'tweet_id' => $tweet->id_str,
				'message' => $tweet->text,
				'screen_name' => $tweet->user->screen_name,
				'profile_image_url' => $tweet->user->profile_image_url
			));
			$this->db->reset_query();
		}
	}

	/**
	 * Pulls latest tweets via API
	 * 
	 * @param  	int 	$count 	Number of tweets to return. 5 is the default
	 * @return 	mixed 			Array of tweet objects
	 */
	function pull_tweets($count = 5)
	{
		return $this->conn->get('statuses/user_timeline', array(
			'screen_name' => 'ahnkeelee', 
			'count' => $count
		));
	}

	/**
	 * Empties out the tweets table
	 * 
	 * @return 	bool 		True on success, false otherwise
	 */
	function empty_table()
	{
		return $this->db->truncate(self::TABLE);
	}

}