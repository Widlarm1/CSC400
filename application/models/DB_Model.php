<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_Model extends CI_Model {


	public function check_user($email){
		$this->db->select('*');
		$this->db->from('Staff');
		$this->db->where('email', $email);
		$query = $this->db->get();
		if($query->num_rows() > 0){
		  return TRUE;
		}
		else{
		  return FALSE;
		}

	  }
	  
	  public function get_records(){
		$data = $this->db->query('SELECT * FROM dummydata');
		return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
	  }

	  public function view_details($id){
		$data = $this->db->query('SELECT * FROM dummydata WHERE id='.$id.'');
		return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row()); 
	  }

	public function get_results($search){
		$data = $this->db->query("SELECT * FROM dummydata WHERE school LIKE  '%$search%'");
		return array('count'=>$data->num_rows(), 'data'=>$data->result(), 'first'=>$data->row());
	}
	  public function update_pass($email, $pwd, $status){
		  $this->db->set('pwd', $pwd);
		  $this->db->set('auth_status', $status);
		  $this->db->where('email', $email);
		  $update = $this->db->update('Staff');
		  if($update){
			  return TRUE;
		  }
		  else{
			  return FALSE;
		  }
	  }

	  public function update_auth($email, $auth_token){
		  $this->db->set('auth_token', $auth_token);
		  $this->db->where('email', $email);
		  $update_auth = $this->db->update('Staff');
		  if($update_auth){
			  return true;
		  }
		  else{
			  return false;
		  }
	  }

		public function get_auth($email, $code){
			$this->db->select('*');
			$this->db->from('Staff');
			$this->db->where('email', $email);
			$results = $this->db->get()->result_array();
			foreach($results as $row){
			$verification = $row['auth_token'];
			}
			if($code == $verification){
				$status = 1;
				$this->db->set('auth_status', $status);
				$this->db->where('email', $email);
				$update_status = $this->db->update('Staff');
				if($update_status){
					return TRUE;
				}

			}
			else{
				return FALSE;
			}
		}

	public function verify_login($email, $pwd){
		$this->db->select('*');
		$this->db->from('Staff');
		$this->db->where('email', $email);
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

	public function validate_auth($email, $token){
		$this->db->select('*');
		$this->db->from('Staff');
		$this->db->where('email', $email);
		$results = $this->db->get()->result_array();
		foreach($results as $row){
			$correct_token = $row['auth_token'];
		}
		if($token!==$correct_token){
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
