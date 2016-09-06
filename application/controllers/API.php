<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class API extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
    }
    
    public function index () {
        
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->GetInfo()));
        
    }
    
    private function GetInfo () {
        
        return ["API version" => "v1", "token" => $this->security->get_csrf_hash()];
            
    }
    
}