<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

/**
 * Class Auth_model
 */
class Auth_model extends CI_Model {
    
    /**
     * @return boolean
     */
    public function __construct() {
        
        parent::__construct();
        
        return TRUE;
        
    }
    
    /**
     * 
     * @param string $data
     * @return string
     */
    public function GetUsername ($data) {
        return $this->db->query('SELECT username FROM ' . $this->config->item('users', 'database') . ' WHERE id="' . $data . '"')->row()->username;
    }
    
    /**
     * 
     * @param string $data
     * @return string
     */
    public function GetAvatar ($data) {
        return $this->db->query('SELECT avatar FROM ' . $this->config->item('users', 'database') . ' WHERE id="' . $data . '"')->row()->avatar;
    }
    
    /**
     * 
     * @param string $data
     * @return string or int
     */
    public function GetUsernameExists ($data) {
        
        if($this->db->query('SELECT * FROM ' . $this->config->item('users', 'database') . ' WHERE username="' . $data . '"')->num_rows() > 0) {
            return $this->db->query('SELECT id FROM ' . $this->config->item('users', 'database') . ' WHERE username="' . $data . '"')->row()->id;
        }
        else {
            return 0;
        }
        
    }
    
    /**
     * 
     * @param string $data
     * @return string or int
     */
    public function GetEmailExists ($data) {
        
        if($this->db->query('SELECT * FROM ' . $this->config->item('users', 'database') . ' WHERE email="' . $data . '"')->num_rows() > 0) {
            return $this->db->query('SELECT id FROM ' . $this->config->item('users', 'database') . ' WHERE email="' . $data . '"')->row()->id;
        }
        else {
            return 0;
        }
        
    }
    
    /**
     * 
     * @param string $account
     * @return string
     */
    public function GetPasswordCorrect ($account) {
        return $this->db->query('SELECT password FROM ' . $this->config->item('users', 'database') . ' WHERE id="' . $account . '"')->row()->password;
    }
    
}