<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function signin()
	{   $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('DB_Model');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        // regex for password validation required|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('login');
        }
        else{
            $username = $this->input->post('username');
            $pwd = $this->input->post('pwd');
            
            // check if the user exists 
            $if_exists = $this->DB_Model->check_user($username);
            if($if_exists == FALSE){
                $data['no_user']='<div class="alert alert-warning fw-normal leard">There is no account associated with that username</div>';
                $this->load->view('login', $data);
            }
        }
	}
}
