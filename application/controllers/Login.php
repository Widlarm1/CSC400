<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function signin()
	{   $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('DB_Model');
        $this->load->library('session');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        // regex for password validation required|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('login');
        }
        else{
            $email = $this->input->post('email');
            $pwd = $this->input->post('pwd');
            
            // check if the user exists 
            $if_exists = $this->DB_Model->check_user($email);
            if($if_exists == FALSE){
                $data['no_user']='<div class="alert alert-warning fw-normal leard">There is no account associated with that username</div>';
                $this->load->view('login', $data);
            }
            else{
                $verify = $this->DB_Model->verify_login($email, $pwd);
                if($verify == FALSE){
                    $data['wrong_pwd']='<div class="alert alert-danger fw-normal">You entered the wrong password!</div>';
                    $this->load->view('signin', $data);
                }
                else{
                $user_data = array('email'=>$email);
                $this->session->set_userdata($user_data);
                redirect('http://localhost/CSC400/index.php/Home/landing');
                }
                
            }
        }
	}

    public function forgot_pass(){
        $this->load->model('DB_Model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run()==FALSE){
            $this->load->view('forgot_pwd');
        }
        else{
            // Check to see if this user has an account 
            $email = $this->input->post('email');
            $check_user = $this->DB_Model->check_user($email);
            if($check_user == FALSE){
                $data['no_user']='<div class="alert alert-warning">The email you used does not exist in the system</div>';
                $this->load->view('forgot_pwd', $data);
            }
            else{
                $auth_token = mt_rand(1111,9999);
                if($this-> __email_user($email, $auth_token)==FALSE){
                    $data['email_failed']='<div class="alert alert-danger">Unable to send email because '.$this->email->print_debugger().'</div>';
                    $this->load->view('forgot_pwd', $data);
                }
                else{
                    $update_auth = $this->DB_Model->update_auth($email, $auth_token);
                    if($update_auth == TRUE){
                    redirect('http://localhost/CSC400/index.php/Login/validate_auth/'.$email.'');
                    }
                    else{
                        $data['update_failed']='<div class="alert alert-danger">Unable to update auth table</div>';
                        $this->load->view('forgot_pwd', $data);
                    }
                }
            }
        }
    }
    private function __email_user($email, $auth_token){
       $body ='Please enter this 4 digit code to reset your password: '.$auth_token. '';
        // Password reset email
        $this->load->library('email');
        $config['useragent']='CodeIgniter';
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.gmail.com';
        $config['smtp_user']='nhicvoting@gmail.com';
        $config['smtp_pass']='ClubPenguin99!';
        $config['smtp_port']='465';
        $config['newline']="\r\n";
        $config['smtp_timeout']='5';
        $config['smtp_crypto']='ssl';
        $config['wordwrap']=TRUE;
        $config['mailtype']='html';
        $config['charset']='iso-8859-1';
        $this->email->initialize($config);
        $this->email->from('knowledgebasescsu@gmail.com', 'Password Reset');
        $this->email->to($email, 'Do not reply');
        $this->email->subject('Password reset request');
        $this->email->message($body);
      
        if(!$this->email->send()){
        return FALSE;
        return $this->email->print_debugger();
      
        }
        else{
      
          return TRUE;
        }
      }

      public function create_pass($email){
          $this->load->helper('url');
          $this->load->model('DB_Model');
          $this->load->library('form_validation');
          $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]');
        $this->form_validation->set_rules('confirm_pwd', 'Retype Password', 'required|trim|matches[pwd]');
        if($this->form_validation->run()==FALSE){
            $this->load->view('create_pass');
        }
        else{
            $email = $this->input->get('email');
            $pwd = password_hash($this->input->post('pwd'), PASSWORD_DEFAULT);
            $status = 1;
            $update_pwd = $this->DB_Model->update_pass($email, $pwd, $status);
            if($update_pwd == TRUE){
                redirect('http://localhost/CSC400/index.php/Login/signin');
            } 
            else{
                $data['update_failed']='<div class="alert alert-danger">We were unable to update your password</div>';
                $this->load->view('create_pass', $data);
            }
        }
          

      }
      public function validate_auth($email){
          $this->load->model('DB_Model');
          $this->load->library('form_validation');
          $this->load->helper('url');
          $this->form_validation->set_rules('token', 'Verification Code', 'required|is_numeric|min_length[4]|max_length[4]');
          if($this->form_validation->run()==FALSE){
            $this->load->view('validate_auth');
          }
          else{
              $token = $this->input->post('token');
              $verify_auth = $this->DB_Model->validate_auth($email, $token);
              if($verify_auth == TRUE){
                  redirect('http://localhost/CSC400/index.php/Login/create_pass/'.$email.'');
              }
              else{
                  $data['err']='<div class="alert alert-danger">Something went wrong!</div>';
                  $this->load->view('validate_auth', $data);
              }
          }
          
      }
    
}
