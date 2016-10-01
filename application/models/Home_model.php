<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Home_model extends CI_Model {
    
    /**
     * 
     * @return boolean
     */
    public function __construct() {
        
        parent::__construct();
        
        return TRUE;
        
    }
    
    /**
     * 
     * @return string
     */
    public function GetTotalRows () {
        
        return $this->db->count_all($this->config->item('news', 'database'));
        
    }
    
    /**
     * 
     * @param int $limit
     * @param int $start
     * @return boolean
     */
    public function GetNewsliste ($limit, $start) {
        
        $this->db->limit($limit, $start);
        $this->db->select("*, " . $this->config->item('categorie', 'database') . ".name, DATE_FORMAT(`date_created`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'date_created'");
        $this->db->join($this->config->item('categorie', 'database'), $this->config->item('categorie', 'database') . ".id = " . $this->config->item('news', 'database') . ".categorie", 'left');
        
        $this->query = $this->db->get_where($this->config->item('news', 'database'), ["active" => "1"]);

        if ($this->query->num_rows() > 0) {
            foreach ($this->query->result_array() as $this->row) {
                $ret[] = $this->row;
            }
            return $ret;
        }
        return false;
        
    }
    
    /**
     * 
     * @param string $id
     * @return string
     */
    public function GetNews ($id) {
        
        return $this->db->query("SELECT *, DATE_FORMAT(`date_created`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'date_created' FROM " . $this->config->item('news', 'database') . " WHERE id='" . $id . "'")->row();
        
    }
    
    /**
     * 
     * @param string $news
     * @return string
     */
    public function GetCommentaires ($news) {
        
        return $this->db->query("SELECT *, " . $this->config->item('users', 'database') . ".username, " . $this->config->item('users', 'database') . ".avatar, DATE_FORMAT(`date_com`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'date_com' FROM " . $this->config->item('comments', 'database') . " LEFT JOIN " . $this->config->item('users', 'database') . " ON " . $this->config->item('users', 'database') . ".id = " . $this->config->item('comments', 'database') . ".author WHERE news_id='" . $news . "'")->result_array();
        
    }
    
    public function AddComNews ($news, $msg, $user) {
        
        $this->db->query("INSERT INTO " . $this->config->item('comments', 'database') . "(news_id, author, text) VALUES ('" . $news . "', '" . $user . "', '" . $msg . "')");
        return $this->db->insert_id();
        
    }
    
}