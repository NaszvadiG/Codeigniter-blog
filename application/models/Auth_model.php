<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Auth_model extends CI_Model {
    
    protected $table_users = "users";
    
    public function __construct() {
        
        parent::__construct();
        
    }
    
}