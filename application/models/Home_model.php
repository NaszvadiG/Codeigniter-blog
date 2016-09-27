<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Home_model extends CI_Model {
    
    protected $table_news = "news";
    
    public function __construct() {
        
        parent::__construct();
        
    }
    
    public function GetTotalRows () {
        
        return $this->db->count_all($this->table_news);
        
    }
    
    public function GetNewsliste ($limit, $start) {
        
        $this->db->limit($limit, $start);
        $this->db->select("*, DATE_FORMAT(`date_created`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'date_created'");
        $this->query = $this->db->get_where($this->table_news, ["active" => "1"]);

        if ($this->query->num_rows() > 0) {
            foreach ($this->query->result_array() as $this->row) {
                $ret[] = $this->row;
            }
            return $ret;
        }
        return false;
        
    }
    
}