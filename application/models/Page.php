<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_model {

	function __construct()
	{
		parent::__construct();
		$this->load->library('Twitter_OAuth', '', 'tauth');
	}

	function get_random_products($limit = 10)
	{
		$styles = Product_Style::TABLE;
		$products = Product::TABLE;

		$this->db->select("$products.id, $products.name, $products.price, $styles.image");
		$this->db->from($products);
		$this->db->join($styles, "$products.id = $styles.product_id");
		$this->db->order_by("$products.id", 'RANDOM');
		$this->db->group_by("$products.id");
		$this->db->limit($limit);

		return $this->db->get()->result_array();
	}

	function get_tweets()
	{
		// Grab tweets from DB
		$tweets = $this->Twitter->fetch_all();

		if (! $tweets || $this->Twitter->need_update($tweets[0]))
		{
			//grab via api
			$tweets = $this->tauth->pull_tweets();

			$this->Twitter->empty_table();

			//insert new tweets into db
			$this->Twitter->multi_insert($tweets);
		}

		// grab tweets again from DB. Expected return from DB to be used in next step
		$tweets = $this->Twitter->fetch_all();

		array_walk( $tweets, function(&$tweet, $key) {
			$tweet['message'] = $this->tauth->makeClickableLinks($tweet['message']);
		});

		return $tweets;
	}
}