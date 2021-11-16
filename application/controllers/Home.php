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
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->form_validation->set_rules('search', 'Search', 'required');
		if($this->form_validation->run()==FALSE){
			$this->load->view('home', $data);
		}
		else{
			/*$search = $this->input->post('search');
			$data['results']= $this->DB_Model->get_results($search);
			$this->load->view('search_results', $data); */
			$search = $this->input->post('search');
			$data['results']= $this->DB_Model->get_results($search);
			$this->load->view('search_results', $data);
		} 
		
	}
	public function view_details($id){
		$this->load->model('DB_Model');
		$this->load->helper('url');
		$data['data'] = $this->DB_Model->view_details($id);
		$this->load->view('view_details', $data);
	}
	public function records(){
		$this->load->model('DB_Model');
		$data['records']=$this->DB_Model->get_records();
		$this->load->view('records', $data);
	}
}
