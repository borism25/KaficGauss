<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Remove_id extends CI_Model {

	public function dData($id) {
		$query=$this->db->query("DELETE FROM `test`.`proizvodi` WHERE `proizvodi`.`ID` = '{$id}' LIMIT 1");

		$result = $this->db->query($sql);
	}
}