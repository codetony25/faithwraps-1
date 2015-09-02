<?php
defined('BASEPATH') OR exit('No direct script access allowed');

trait DB_Trait {
	var $ci;

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('database');
	}

	/**
	 * Query the database to return a single row.
	 * 
	 * @param 	array 	$data 	Key => value pair. Key needs to be an existing table column
	 * @return 	array 			Returns single row from table
	 */
	function fetch(array $data)
	{
		return $this->db->get_where(self::TABLE, $data)->row_array();
	}

	/**
	 * Query the database to return all rows from a table
	 * 
	 * @return 	array 			Returns an associative array containing all rows from a table
	 */
	function fetch_all()
	{
		return $this->db->get(self::TABLE)->result_array();
	}

	/**
	 * Query the database to return all rows from a table where conditions are met
	 * 
	 * @param 	array 	$data 	Key => value pair. Key needs to be an existing table column
	 * @return 	array 			Returns an associative array containing all rows from a table
	 */
	function fetch_all_where(array $data)
	{
		return $this->db->get_where(self::TABLE, $data)->result_array();
	}

}