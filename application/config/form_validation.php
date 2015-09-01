<?php
$config = array(
	"login" => array(
		array(
			'field' => 'email',
			'label' => 'E-Mail',
			'rules' => 'required|trim|valid_email|max_length[255]'
			 ),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|trim|min_length[8]|max_length[255]'
			 )
		),
	"register" => array(
		array(
			'field' => 'email',
			'label' => 'E-Mail',
			'rules' => 'required|trim|valid_email|max_length[255]|is_unique[users.email]'
			 ),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|trim|min_length[8]|max_length[255]'
			 ),		
		array(
			'field' => 'confirm_password',
			'label' => 'Password Confirmation',
			'rules' => 'required|trim|min_length[8]|max_length[255]|matches[password]'
			 )
		)

);

?>