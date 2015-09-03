<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'traits/DB_Trait.php';

class Twitter extends CI_Model {

	use DB_Trait;

	const TABLE = 'tweets';

	function __construct()
	{
		parent::__construct();
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
	 * Empties out the tweets table
	 * 
	 * @return 	bool 		True on success, false otherwise
	 */
	function empty_table()
	{
		return $this->db->truncate(self::TABLE);
	}

}