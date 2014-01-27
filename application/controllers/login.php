<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()	{

		$logged = $this->session->userdata('logged_in');

		if (!$logged) {

				if (empty($_POST)) {
					$this->load->view('login');
				} else {

					$username= $this->input->post('username');
					$password= $this->input->post('password');

					$this->load->model("User_model");
					$response = $this->User_model->checkUser($username, $password);
					
					if(is_object($response)) {
						$this->session->set_userdata('logged_in', 'TRUE');
						redirect('welcome', 'location');
						
					}else {
						$this->load->view('login');
					}
				
				}
		}else {
			redirect('welcome','location');
		}



	}
}