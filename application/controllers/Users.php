<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


	public function __construct() 
	{
		parent::__construct();

		$this->load->model("Product");
	}

	/**
	 * Loads default view: user registration/login
	 */
	public function index()
	{
		$this->template->load('bootstrap', 'users/index', array(
			'title' => 'Login Registration'
		));
	}

	public function register()
	{
		if ($registration_feedback = $this->User->validate_registration())
		{
			if ($user_id = $this->User->create_user($this->input->post()))
			{
				// if ($email_sent = $this->User->send_verification_email($user_id))
				// 	$registration_feedback = "Verification email sent. Please check your inbox";
				// else
				// 	$registration_feedback = "Error: Email could not be sent to that address";
			}
			else // Error during user creation
			{
				$registration_feedback = 'Error: User could not be created';
			}
		}

		$this->session->set_flashdata('registration_feedback', $registration_feedback);

		redirect('/');
	}

	public function login()
	{
		if ($login_feedback = $this->User->validate_login())
		{
			if ($user = $this->User->verify_login($this->input->post()))
			{
				redirect('/members');
			}
			else
			{
				$login_feedback = 'Error: User with that email/password combination could not be found.';
			}
		}

		$this->session->set_flashdata('registration_feedback', $login_feedback);

		redirect('/');
	}

	public function confirm($code)
	{
		if ($this->User->confirm($code))
		{
			$activated = $this->User->activate($code);
			$this->session->set_flashdata('registration_feedback', 'Account was succesfully activated. Please log in.');
		}
		else
		{
			$this->session->set_flashdata('registration_feedback', 'Error: Confirmation code was not found');
		}

		redirect('/');
	}
}

?>