<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tablica extends CI_Model {

	public function gData() {
		$query=$this->db->query("SELECT MAX( datum_unosa ) as datum FROM proizvodi LIMIT 1");

		$row = $query->row_array();
		$row1 = $row['datum'];
		// $datum=date('Y-m-d');

		$query1=$this->db->query("SELECT MAX( smjena ) as smjena FROM proizvodi WHERE `datum_unosa` = '{$row1}' LIMIT 1");
		$row = $query1->row_array();
		$row2 = $row['smjena'];

		$sql = " SELECT * FROM `proizvodi` WHERE `datum_unosa` = '{$row1}' AND `smjena` = '{$row2}' ";


		$result = $this->db->query($sql);
		return $result->result();
	}

	public function gAllData() {

		$sql = " SELECT * FROM `proizvodi`";

		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function gDateData($date1, $date2) {

		$sql = "SELECT * FROM `proizvodi` WHERE `datum_unosa` BETWEEN '{$date1}' AND '{$date2}' ORDER BY  `datum_unosa` , `smjena`  ";

		$result = $this->db->query($sql);
		return $result->result();
	}


	public function getDate() {
		$sql = "SELECT MAX( datum_unosa ) as datum FROM proizvodi";
		$query=$this->db->query($sql);
		return $query->result();
		
	}


	public function rData($naziv_proizvoda, $preuzeto_stanje, $ulaz, $zavrsno_stanje, $prodano_kolicina, $prodano_zavrsno , $cijena, $prodano_iznos, $smjena) {

			$datum_unosa=date("Y-m-d");
			//danasnji datum

			$sql ="INSERT INTO `test`.`proizvodi` (`ID`, `naziv_proizvoda`, `preuzeto_stanje`, `ulaz`, `zavrsno_stanje`, `prodano_kolicina`, `prodano_zavrsno`, `cijena`, `datum_unosa`,`prodano_iznos`,`smjena`) VALUES (NULL, '$naziv_proizvoda', '$preuzeto_stanje', '$ulaz', '$zavrsno_stanje', '$prodano_kolicina', '$prodano_zavrsno' , '$cijena', '{$datum_unosa}', '$prodano_iznos', '{$smjena}')";

			$this->db->query($sql);
			//Unos proizvoda u Bazu
		}

    public function dId($id) {
        $sql="DELETE FROM `test`.`proizvodi` WHERE `proizvodi`.`ID` = {$id}";
		$this->db->query($sql);

    }
}