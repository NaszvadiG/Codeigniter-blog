<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

/**
 * Class General_model
 */
class General_model extends CI_Model {
      
    /**
     * @return boolean
     */
    public function __construct() {
        
        parent::__construct();
        
        return TRUE;
        
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
     * @return string
     */
    public function get_message_chatbox ($after, $limit = 100) {	
        if ($after != 0) {
            return $this->db->query("SELECT chatbox.id, chatbox.msg, users.username, DATE_FORMAT(`time`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'time' FROM chatbox LEFT JOIN users ON users.id = chatbox.user WHERE chatbox.id > '".$after."' ORDER BY chatbox.id DESC LIMIT $limit")->result_array();
        }
        else {
            return $this->db->query("SELECT chatbox.id, chatbox.msg, users.username, DATE_FORMAT(`time`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'time' FROM chatbox LEFT JOIN users ON users.id = chatbox.user ORDER BY chatbox.id DESC LIMIT $limit")->result_array();
        }
    }

    /**
     * @param string $message
     * @param string $author
     *
     * @return mixed
     */
    public function add_message_chatbox ($message, $author) {
        $this->db->query('INSERT INTO chatbox(user, msg) VALUES ("'.$author.'", "'.$message.'")');
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
    
}