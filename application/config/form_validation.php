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
	),
	'password_reset' => array(
		array(
			'field' => 'email',
			'label' => 'Account Email',
			'rules' => 'required|trim|valid_email'
		)
	),
	'product' => array(
		array(
			'field' => 'product_style',
			'label' => 'Product Style',
			'rules' => 'required|trim|integer|greater_than[0]'
		),
		array(
			'field' => 'product_qty',
			'label' => 'Quantity',
			'rules' => 'required|trim|integer|greater_than[0]'
		)
	),
	'newsletter' => array(
		array(
			'field' => 'email',
			'label' => 'E-Mail',
			'rules' => 'required|trim|valid_email|is_unique[newsletters.email]'
		)
	),
	'billing' => array(
		array(
			'field' => 'name',
			'label' => 'Name on Card',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'address_1',
			'label' => 'Billing Address Line 1',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'city',
			'label' => 'City',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'state',
			'label' => 'State',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'zip_code',
			'label' => 'Zip Code',
			'rules' => 'required|trim|integer'
		)
	)
);