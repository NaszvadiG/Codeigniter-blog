<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

/**
 * Class Auth
 */
class Auth extends MY_Controller {

    /**
     * @var array
     */
    public $data = [];

    /**
     * Auth constructor.
     * @return boolean
     */
    public function __construct() {

        parent::__construct();
        
        $this->title_for_layout = ('Authentification');

        $this->load->model('Auth_model');

        return TRUE;

    }

    /**
     * Index conntroller
     */
    public function index() {
        
        
    }
    
    /**
     * Form for new Account
     * @return string
     */
    public function Register () {
        
        $this->title_spage = "Inscription";
        
        return $this->layout->view ('pages/Auth/Register', $this->data);
        
    }
    
    public function ResetPassword () {
        
    }

}