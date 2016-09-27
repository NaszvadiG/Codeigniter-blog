<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class General_model extends CI_Model {
      
    public function __construct() {
        
        parent::__construct();
        
    }
    
    /**
     * 
     * Get ip banned
     * 
     * @param string $IP
     * @return int
     */
    public function GetIpBanned($IP) {
        
        if ($this->db->query("SELECT * FROM banned_ip WHERE ip = '" . $IP . "'")->num_rows() > 0) {
            return 1;
        }
        
    }
    
    /**
     * 
     * list of message 
     * 
     * @param string $limit
     * @return type
     */
    public function get_message_chatbox ($limit = 100) {
        $sql = "SELECT *, DATE_FORMAT(`time`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'time' FROM chatbox ORDER BY id DESC LIMIT $limit";		
	return $this->db->query($sql)->result_array();
    }
    
}