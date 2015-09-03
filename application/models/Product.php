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

	/**
	 * Retrieves similar product info by $gallery_id
	 */
	function fetch_similar($gallery_id)
	{
		$styles = Product_Style::TABLE;
		$products = self::TABLE;

		$this->db->select("$products.id, $products.name, $products.price, $styles.image");
		$this->db->from($products);
		$this->db->join($styles, "$products.id = $styles.product_id");
		$this->db->where("$products.gallery_id", $gallery_id);
		$this->db->group_by("$products.id");

		return $this->db->get()->result_array();
	}
}