<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_data extends CI_Controller {

	
	public function index() {
		$logged = $this->session->userdata('logged_in');

		if ($logged) {
			$this->load->helper('form');

            if (!$this->input->post('submit')) {
                $this->load->view('header');
                $this->load->view('date');

            } else {
                $this->load->model('Tablica');

                $date1 = $this->input->post('datepicker1');
                $date2 = $this->input->post('datepicker2');
                $data["datedata"]=$this->Tablica->gDateData($date1, $date2);

                $this->load->view('header');
                $this->load->view('view_data', $data);

                // $data=$this->Tablica->gDateData($date1, $date2);

                // echo '<pre>';
                // print_r($date1);
                // print_r($date2);
                // print_r($data);
                // echo '</pre>';
            }
        } else {
            $this->load->view('welcome');
		}
	}
}