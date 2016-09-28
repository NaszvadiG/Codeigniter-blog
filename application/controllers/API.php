<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class API extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->model('Auth_model');
        
    }
    
    public function index () {
        
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->GetInfo()));
        
    }
    
    public function GetUsernameExists () {
        
        $this->array = $this->GetInfo();
        
        if ($this->Auth_model->GetUsernameExists($_POST['username']) > 0) {
            $this->array["Result"] = 1;
            $this->array["AccountID"] = $this->Auth_model->GetUsernameExists($_POST['username']);
        }
        else {
            $this->array["Result"] = 0;
        }
                
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
        
    }
    
    public function GetUsernameByID () {
        $this->array = $this->GetInfo();
        $this->array["AccountUsername"] = $this->Auth_model->GetUsername($_POST['accountID']);
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
    }
    
    public function GetEmailExists () {
        
        $this->array = $this->GetInfo();
        
        if ($this->Auth_model->GetEmailExists($_POST['email']) > 0) {
            $this->array["Result"] = 1;
            $this->array["AccountID"] = $this->Auth_model->GetEmailExists($_POST['email']);
        }
        else {
            $this->array["Result"] = 0;
        }
        
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
        
    }
    
    public function GetPasswordCorrect () {
        $this->array = $this->GetInfo();
        
        if (password_verify($_POST['password'], $this->Auth_model->GetPasswordCorrect($_POST['account']))) {
            $this->SetSession($_POST['account'], $_POST['remember']);
            $this->array["Result"] = 1;
        } else {
            $this->array["Result"] = 0 ;
        }
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
    }
    
    public function SetLogout () {
        
        $this->load->helper('cookie');
        
        delete_cookie("remember_me");
        
        $this->session->sess_destroy();
        
        $this->array = $this->GetInfo();
        $this->array["Result"] = 1;
        
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
    }
    
    private function SetSession ($account, $remember) {
        
        $this->DataSession = [
            'account_id' => $account,
            'account_name' => $this->Auth_model->GetUsername($account),
            'account_ip' => $this->input->ip_address(),
            'logged_in' => TRUE
        ];
        
        if ($remember == 1) {
            $this->load->helper('cookie');
            $this->DataCookie = [
                'name'   => 'remember_me',
                'value'  => $account,
                'expire' => '32140800',
            ];
            $this->input->set_cookie($this->DataCookie, TRUE);
            $this->config->set_item('sess_expiration', '32140800');
            $this->session->sess_expiration = '32140800';
        }
        
        $this->session->set_userdata($this->DataSession);
        
        return TRUE;
    }
    
    /* CHATBOX */
    
    /**
     * 
     * Get all message of chatbox in AJAX
     * 
     * @return string
     */
    public function GetChatbox () {
        $this->array = $this->GetInfo();
        $this->array['chatbox'] = $this->General_model->get_message_chatbox();
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
    }
    
    public function AddMessageChatbox () {
        $this->array = $this->GetInfo();
        $this->General_model->add_message_chatbox($_POST['message'], $this->session->userdata("account_id"));
        
        $this->array['chatbox'] = array("user" => $this->session->userdata("account_id"), "msg" => $_POST['message'], "time" => "Le <span>" . date('d-m-Y') . "</span> &agrave; <span>" . date('H:i:s') . "</span>");
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
        //$_POST['account'];
    }
    /* CHATBOX */
    
    /**
     * 
     * Get JSON info
     * 
     * @return string
     */
    private function GetInfo () {
        
        return ["API version" => "v1", "token" => $this->security->get_csrf_hash()];
            
    }
    
}