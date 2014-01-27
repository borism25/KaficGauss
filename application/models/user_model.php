<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function checkUser($username, $password) {
		$hashedPassword= md5($password);
		$userObj= $this->getUserData($username);
			if($userObj) {
				if($userObj->password == $hashedPassword) {
					//redirect
					return $userObj;
				} else {
					//ako nam vrati FALSE
					return false;
				}
			}
		}

	private function getUserData($username){ 
		if(empty($username)) return false;

		$query = $this->db->query("SELECT * FROM user WHERE username='{$username}' LIMIT 1 ");

		if($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	}
}