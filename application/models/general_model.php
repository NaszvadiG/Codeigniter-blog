<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class General_model extends CI_Model {
    
    public function __construct() {
        
        parent::__construct();
        
    }
    
    public function GetIpBanned($IP) {
        
        if ($this->db->query ( "SELECT * FROM banned_ip WHERE ip = '" . $IP . "'" )->num_rows () > 0) {
            return 1;
        }
        
    }
    
}