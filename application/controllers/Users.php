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
		$this->template->load('bootstrap', 'index', array(
			'title' => 'Login Registration'
		));
	}

	public function register()
	{
		if ($registration_feedback = $this->form_validation->run('register'))
		{
			if ($user_id = $this->User->create_user($this->input->post()))
			{
				if ($email_sent = $this->User->send_verification_email($user_id))
					$registration_feedback = "Verification email sent. Please check your inbox";
				else
					$registration_feedback = "Error: Email could not be sent to that address";
			}
			else // Error during user creation
			{
				$registration_feedback = 'Error: User could not be created';
			}
		}

		$this->session->set_flashdata('login_feedback', $registration_feedback);

		redirect('/users');
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

		$this->session->set_flashdata('login_feedback', $login_feedback);

		redirect('/users');
	}

	/**
	 * Displays the forgot password page to request an email
	 */
	function forgot_password()
	{
		$this->template->load('bootstrap', 'users/forgot_password', array(
			'title' => 'Forgot Password'
		));
	}

	/**
	 * Forgot password posts to this route for form validation & processing
	 */
	function request_reset()
	{
		if ($reset_feedback = $this->form_validation->run('password_reset'))
		{
			$email = $this->input->post('email');

			if ($user = $this->User->fetch_user(array('email' => $email)))
			{
				$this->User->send_reset_email($user);
			}

			$this->session->set_flashdata('login_feedback', "A password reset email was sent to $email. The link is valid for an hour");
			redirect('/users');
		}

		$this->session->set_flashdata('reset_feedback', $reset_feedback);

		redirect('/users/forgot_password');
	}

	function reset_password()
	{
		if ($feedback = $this->form_validation->run('reset_password'))
		{
			if( $this->User->reset_password($this->input->post()) )
				$feedback = 'Your password was successfully updated. Please log in';
			else
				$feedback = 'Invalid or expired token. Please try again';
		}

		$this->session->set_flashdata('login_feedback', $feedback);

		redirect('/users');
	}

	/**
	 * Displays the password reset form.
	 * If not token is availabe in the url, redirects to login page
	 */
	function password_reset($token)
	{
		if (! $token || $token == '')
		{
			$this->session->set_flashdata('login_feedback', "Invalid reset token");
			redirect('users/');
		}

		$this->template->load('bootstrap', 'users/password_reset', array(
			'title' => 'Reset Password',
			'token' => $token
		));
	}

	public function confirm($code)
	{
		if ($this->User->confirm($code))
		{
			if ($activated = $this->User->activate($code))
				$feedback = 'Account was succesfully activated. Please log in.';
			else
				$feedback = 'Error: invalid or missing token';
		}
		else
		{
			$feedback = 'Error: Confirmation code was not found';
		}

		$this->session->set_flashdata('login_feedback', $feedback);

		redirect('/users');
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