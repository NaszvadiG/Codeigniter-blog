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
        
        $this->title_spage = "Auth";

        $this->load->model('Auth_model');

        return TRUE;

    }

    /**
     * Index conntroller
     */
    public function index() {
        
        
    }

}