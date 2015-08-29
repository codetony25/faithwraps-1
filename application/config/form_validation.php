<?php
$config = array(
	"login" => array(
		array('field' => 'email',
			  'label' => 'E-Mail',
			  'rules' => 'required|trim|valid_email|max_length[45]'),
		array('field' => 'password',
			  'label' => 'Password',
			  'rules' => 'required|trim|min_length[8]|max_length[45]')
		),
	"register" => array(
		array('field' => 'name',
			  'label' => 'Name',
			  'rules' => 'required|trim|min_length[2]|max_length[40]'),
		array('field' => 'email',
			  'label' => 'E-Mail',
			  'rules' => 'required|trim|valid_email|max_length[45]|is_unique[users.email]'),
		array('field' => 'password',
			  'label' => 'Pasaword',
			  'rules' => 'required|trim|min_length[8]|max_length[45]|matches[confirm_password]'),		
		array('field' => 'confirm_password',
			  'label' => 'Confirm Pasaword',
			  'rules' => 'required|trim|min_length[8]|max_length[45]'),
		array('field' => 'dob',
			  'label' => 'Date of Birth',
			  'rules' => 'required|trim|min_length[10]|max_length[10]')		
		)

);

?>