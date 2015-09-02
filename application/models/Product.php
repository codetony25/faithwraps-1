<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'traits/DB_Trait.php';

class Product extends CI_model {

	use DB_Trait;

	const TABLE = 'products';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_products() 
	{
		return $this->db->get(self::TABLE)->result_array();
	}

	public function get_all_styles() 
	{
		return $this->db->get('product_styles')->result_array();
	}

	public function get_all_categories() 
	{
		return $this->db->get('galleries')->result_array();
	}

	public function get_all_gems() 
	{
		return $this->db->get('gems')->result_array();
	}	

	public function get_by($table, $field, $value) 
	{
		$this->db->where($field, $value);
		return $this->db->get($table)->row_array();
	}

	function fetch_product_styles($product_id)
	{
		
	}
}