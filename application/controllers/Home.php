<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['email'])){
			redirect('http://localhost:8888/CSC400/index.php/Login/signin');
		}
	}
	public function landing()
	{
		$this->load->view('home');
	}
}
