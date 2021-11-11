<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['email'])){
			redirect('http://localhost:/CSC400/index.php/Login/signin');
		}
	}
	public function landing()
	{$this->load->model('DB_Model');
		$data['records']=$this->DB_Model->get_records();
		$this->load->view('home', $data);
	}

	public function records(){
		$this->load->model('DB_Model');
		$data['records']=$this->DB_Model->get_records();
		$this->load->view('records', $data);
	}
}
