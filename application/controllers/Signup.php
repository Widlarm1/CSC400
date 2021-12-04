<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function create_acct()
	{   	$this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('DB_Model');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]');
        $this->form_validation->set_rules('confirm_pwd', 'Retype Password', 'required|trim|matches[pwd]');
        if($this->form_validation->run()==FALSE){
            $this->load->view('signup');
        }
        else{
            // check if user exists
            $email = $this->input->post('email');
            $if_exists = $this->DB_Model->check_user($email);
            if($if_exists == TRUE){
                $data['already_exists']='<div class="alert alert-warning fw-bold">Looks like you already have an account with us, go ahead and login <br> <a href="../Login/signin" class="text-primary">Login here</a></div>';
                $this->load->view('signup', $data);
            }
            else{
                // Insert user data into databse
								$auth_token = mt_rand(1111, 9999);
                $user_data = array(
                'fname'=>$this->input->post('fname'),
                'lname'=>$this->input->post('lname'),
                'email'=>$this->input->post('email'),
                'pwd'=>password_hash($this->input->post('pwd'), PASSWORD_DEFAULT),
								'auth_token'=>$auth_token
                );
                $insert_user = $this->DB_Model->create_account($user_data);

                if($insert_user){
									$email = $this->input->post('email');
                  	redirect('http://192.168.0.200/CSC400/index.php/Login/signin');

							  }
                else{
                    $data['failed']='<div class="alert alert-danger fw-bold text-center">Hey, '.$this->input->post('fname'). 'we were unable to create your account'. '</div>';
                    $this->load->view('signup', $data);
                }
            }
        }

	}

	public function verify_acct($email){
					$this->load->library('form_validation');
					$this->load->helper('url');
					$this->load->model('DB_Model');
					$this->form_validation->set_rules('code', 'Verification Code', 'trim|required|numeric|min_length[4]|max_length[4]');
					if($this->form_validation->run()==FALSE){
						$this->load->view('verify');
					}
					else{
						$code = $this->input->post('code');
						$get_code = $this->DB_Model->get_auth($email, $code);
						if($get_code == FALSE){
							$data['wrong_code']='<div class="alert alert-danger fw-bold">Code entered is incorrect, check your email and try again</div>';
							$this->load->view('verify', $data);
						}
						else{
							redirect('http://192.168.0.200/CSC400/index.php/Login/signin');
						}
					}
	}



}
