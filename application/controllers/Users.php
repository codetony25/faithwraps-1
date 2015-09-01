<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


	public function __construct() 
	{
		parent::__construct();

		$this->load->model('Google_OAuth2', 'g_auth');
		// $this->output->enable_profiler();
	}

	/**
	 * Loads default view: user registration/login
	 */
	public function index()
	{
		$this->template->load('bootstrap', 'users/signin', array(
			'title' => 'Login Registration'
		));
	}

	public function register()
	{
		if ($registration_feedback = $this->form_validation->run('register'))
		{
			if ($user_id = $this->User->create_user($this->input->post()))
			{
				// if ($email_sent = $this->User->send_verification_email($user_id))
					$registration_feedback = "Verification email sent. Please check your inbox";
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
		if ($login_feedback = $this->form_validation->run('login'))
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

	function forgot_password()
	{
		$this->template->load('bootstrap', 'users/forgot_password', array(
			'title' => 'Forgot Password'
		));
	}

	function reset_password()
	{
		if ($reset_feedback = $this->form_validation->run('password_reset'))
		{

		}
		else
		{
			$
		}
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

	function google_login()
	{
		if ($access_token = $this->session->userdata('google_access_token'))
		{
			$this->g_auth->client->setAccessToken($access_token);
			$auth = new Google_Service_Oauth2( $this->g_auth->client );
			
			$user = $auth->userinfo_v2_me->get();
			
			if (! $account_info = $this->g_auth->fetch_account($user['id']))
				$new_user_id = $this->g_auth->create_account($user);

			if($account_info)
			{
				$session_data = array(
					'first_name' => $account_info['first_name'],
					'last_name' => $account_info['last_name'],
					'email' => $account_info['email']
				);
			}
			else
			{
				$session_data = array(
					'first_name' => $user['givenName'],
					'last_name' => $user['family_name'],
					'email' => $user['email']
				);
			}

			$this->session->set_userdata('is_logged_in', TRUE);
			$this->session->set_userdata('user', $session_data);

			redirect('/members');
		}
		else
		{
			redirect('/users/google_verify');
		}
	}

	function google_verify()
	{
		if (! isset($_GET['code']))
		{		
			$state = sha1(openssl_random_pseudo_bytes(1024));
			$this->session->set_userdata('g_auth_state', $state);
			$this->g_auth->client->setState($state);	

			$auth_url = filter_var($this->g_auth->get_auth_url(), FILTER_SANITIZE_URL);
			redirect($auth_url);
		}
		else
		{
			if ($_GET['state'] != $this->session->userdata('g_auth_state'))
			{
				$this->session->set_flashdata('Invalid state parameter');
				redirect('/');
			}

			$this->g_auth->client->authenticate($_GET['code']);
			
			if ($access_token = $this->g_auth->client->getAccessToken())
			{
				$this->session->set_userdata('google_access_token', $access_token);
				redirect('/users/google_login');
			}
		}
	}

}

?>