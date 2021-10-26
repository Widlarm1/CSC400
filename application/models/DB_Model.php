<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_Model extends CI_Model {


	public function check_user($username){
		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where('username', $username);
		$query = $this->db->get();
		if($query->num_rows() > 0){
		  return TRUE;
		}
		else{
		  return FALSE;
		}
	
	  }

	public function verify_login($username, $pwd){
		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where('username', $username);
		$results = $this->db->get()->result_array();
		foreach($results as $row){
			$pass = $row['pwd'];
		}
		if(!password_verify($pwd, $pass)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public function create_account($user_data){
		return $this->db->insert('staff', $user_data);
	}
	
}
