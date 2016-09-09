<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Auth_model extends CI_Model {
    
    private $table_users = "users";
    
    public function __construct() {
        
        parent::__construct();
        
    }
    
    public function GetUsername ($data) {
        return $this->db->query('SELECT username FROM '.$this->table_users.' WHERE id="'.$data.'"')->row()->username;
    }
    
    public function GetUsernameExists ($data) {
        
        if($this->db->query('SELECT * FROM '.$this->table_users.' WHERE username="'.$data.'"')->num_rows() > 0) {
            return $this->db->query('SELECT id FROM '.$this->table_users.' WHERE username="'.$data.'"')->row()->id;
        }
        else {
            return 0;
        }
        
    }
    
    public function GetEmailExists ($data) {
        
        if($this->db->query('SELECT * FROM '.$this->table_users.' WHERE email="'.$data.'"')->num_rows() > 0) {
            return $this->db->query('SELECT id FROM '.$this->table_users.' WHERE email="'.$data.'"')->row()->id;
        }
        else {
            return 0;
        }
        
    }
    
    public function GetPasswordCorrect ($account) {
        return $this->db->query('SELECT password FROM '.$this->table_users.' WHERE id="'.$account.'"')->row()->password;
    }
    
}