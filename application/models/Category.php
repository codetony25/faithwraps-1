<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_model {

	const TABLE = 'galleries';

	public function fetch($data) {
		return $this->db->get_where(self::TABLE, $data, 1)->row_array();
	}

	public function fetch_all() {
		return $this->db->get(self::TABLE)->result_array();
	}
}

?>