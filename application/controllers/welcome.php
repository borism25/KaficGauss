<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function index() {
	$logged = $this->session->userdata('logged_in');


	if ($logged) {

	$this->load->helper('form');


	$this->load->model('Tablica');

 	$data["info"]=$this->Tablica->gData();

	$data["date"]= $this->Tablica->getDate();

	 	// $this->load->view('tablica_view', $data);

			if (!$this->input->post('submit')) {
	 			$this->load->view('header');
	 			$this->load->view('tablica_view', $data);
			} else {

	 			$data=$this->Tablica->gData();

				foreach ($data as $dataa){

				$naziv_proizvoda = $this->input->post('naziv_proizvoda_' . $dataa->ID);
				$preuzeto_stanje = $this->input->post('preuzeto_stanje_' . $dataa->ID);
				$ulaz = $this->input->post('ulaz_' . $dataa->ID);
				$zavrsno_stanje = $this->input->post('zavrsno_stanje_' . $dataa->ID);
				$prodano_kolicina = $this->input->post('prodano_kolicina_' . $dataa->ID);
				$prodano_zavrsno = $this->input->post('prodano_zavrsno_' . $dataa->ID);
				$cijena = $this->input->post('cijena_' . $dataa->ID);
				$prodano_iznos = $this->input->post('prodano_iznos_' . $dataa->ID);
				$smjena = $this->input->post('smjena');

				$this->Tablica->rData($naziv_proizvoda, $preuzeto_stanje, $ulaz, $zavrsno_stanje, $prodano_kolicina, $prodano_zavrsno, $cijena, $prodano_iznos, $smjena);

				}

				redirect('welcome', 'location');

				// echo "<pre>";
				// print_r($smjena);
				// echo "</pre>";
				}

			// if($this->input->get_post('obrisi')) {
			// 	$id= $_GET['id'];

			// 	$delSql= "DELETE FROM proizvodi WHERE ID = $id";

			// 	$this->db->query($delSql);
			// 	$this->db->query($delSql1);
			// }


    }else {
        // $this->load->view('login');
        redirect('login', 'location');

    }


    }
    public function removeid(){
        $id = $this->input->post('parametar1');
        $this->load->model('Tablica');
        $this->Tablica->dId($id);
//        echo "bla";
    }


}
