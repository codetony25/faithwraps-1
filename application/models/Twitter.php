<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'traits/DB_Trait.php';

class Twitter extends CI_Model {

	use DB_Trait;

	const TABLE = 'tweets';
	protected $interval;

	function __construct()
	{
		parent::__construct();
		$this->interval = 3600;
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
				'time_tweeted' => date('Y-m-d H:i:s', strtotime($tweet->created_at))
			));
			$this->db->reset_query();
		}
	}

	function need_update()
	{
		$query = "SELECT MIN(id) as id FROM " . self::TABLE;
		$result = $this->db->query($query)->row_array();

		$tweet = $this->fetch( array('id' => $result['id']) );
		$last_checked = $tweet ? strtotime($tweet['time_checked']) : 0;

		return ((time() - $last_checked) > $this->interval );
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