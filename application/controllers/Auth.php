<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Auth extends MY_Controller {
    
    public $data = [];

    public function __construct() {

        parent::__construct();
        
        $this->title_spage = "Auth";

        $this->load->model('Auth_model');

        return TRUE;

    }

    public function index() {
        
        
    }

}