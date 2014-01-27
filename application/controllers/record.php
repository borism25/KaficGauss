<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Record extends CI_Controller {

	public function index() {
	$logged = $this->session->userdata('logged_in');

	if ($logged) {

	$this->load->helper('form');

	$this->load->model('Tablica');

 	if (!$this->input->post('submit')) {
	 			$this->load->view('header');
	 			$this->load->view('record_view');
			} else {

				$naziv_proizvoda = $this->input->post('naziv_proizvoda');
				$preuzeto_stanje = $this->input->post('preuzeto_stanje');
				$ulaz = $this->input->post('ulaz');
				$zavrsno_stanje = $this->input->post('zavrsno_stanje');
				$prodano_kolicina = $this->input->post('prodano_kolicina');
				$prodano_zavrsno = $this->input->post('prodano_zavrsno');
				$cijena = $this->input->post('cijena');
				$prodano_iznos = $this->input->post('prodano_iznos');
				$smjena = $this->input->post('smjena');

				$this->Tablica->rData($naziv_proizvoda, $preuzeto_stanje, $ulaz, $zavrsno_stanje, $prodano_kolicina, $prodano_zavrsno, $cijena, $prodano_iznos, $smjena);

				redirect('record', 'location');

				// echo "<pre>";
				// var_dump($smjena1);
				// echo "</pre>";
				}


			} else {
			redirect('welcome','location');
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */