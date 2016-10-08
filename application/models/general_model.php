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
        if ($this->db->query("SELECT * FROM " . $this->config->item('banned_ip', 'database') . " WHERE ip = '" . $IP . "'")->num_rows() > 0) {
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
            return $this->db->query("SELECT " . $this->config->item('chatbox', 'database') . ".id, " . $this->config->item('chatbox', 'database') . ".msg, " . $this->config->item('users', 'database') . ".username, " . $this->config->item('users', 'database') . ".avatar, DATE_FORMAT(`time`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'time' FROM " . $this->config->item('chatbox', 'database') . " LEFT JOIN " . $this->config->item('users', 'database') . " ON " . $this->config->item('users', 'database') . ".id = " . $this->config->item('chatbox', 'database') . ".user WHERE " . $this->config->item('chatbox', 'database') . ".id > '".$after."' ORDER BY " . $this->config->item('chatbox', 'database') . ".id DESC LIMIT $limit");
        }
        else {
            return $this->db->query("SELECT " . $this->config->item('chatbox', 'database') . ".id, " . $this->config->item('chatbox', 'database') . ".msg, " . $this->config->item('users', 'database') . ".username, " . $this->config->item('users', 'database') . ".avatar, DATE_FORMAT(`time`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'time' FROM " . $this->config->item('chatbox', 'database') . " LEFT JOIN " . $this->config->item('users', 'database') . " ON " . $this->config->item('users', 'database') . ".id = " . $this->config->item('chatbox', 'database') . ".user ORDER BY " . $this->config->item('chatbox', 'database') . ".id DESC LIMIT $limit");
        }
    }

    /**
     * @param string $message
     * @param string $author
     *
     * @return mixed
     */
    public function add_message_chatbox ($message, $author) {
        $this->db->query('INSERT INTO ' . $this->config->item('chatbox', 'database') . '(user, msg) VALUES ("' . $author . '", "' . $message . '")');
        return $this->db->insert_id();
    }
    
    /**
     * 
     * get MembersOnline
     * 
     * @return string
     */
    public function MemberOnline () {
        return $this->db->query('SELECT * FROM ' . $this->config->item('users', 'database') . ' WHERE last_login >= "' . date("Y-m-d H:i:s", time() - (60 * 5)) . '"')->result_array();
    }
    
}