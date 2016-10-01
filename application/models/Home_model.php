<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Home_model extends CI_Model {
    
    /**
     *
     * @var string 
     */
    protected $table_news = "news";
    
    /**
     * 
     * @var string
     */
    protected $table_commentaires = "comments";
    
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
        
        return $this->db->count_all($this->table_news);
        
    }
    
    /**
     * 
     * @param int $limit
     * @param int $start
     * @return boolean
     */
    public function GetNewsliste ($limit, $start) {
        
        $this->db->limit($limit, $start);
        $this->db->select("*, categorie.name, DATE_FORMAT(`date_created`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'date_created'");
        $this->db->join("categorie", "categorie.id = news.categorie", 'left');
        
        $this->query = $this->db->get_where($this->table_news, ["active" => "1"]);

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
        
        return $this->db->query("SELECT *, DATE_FORMAT(`date_created`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'date_created' FROM " . $this->table_news . " WHERE id='" . $id . "'")->row();
        
    }
    
    /**
     * 
     * @param string $news
     * @return string
     */
    public function GetCommentaires ($news) {
        
        return $this->db->query("SELECT *, users.username, users.avatar, DATE_FORMAT(`date_com`,'Le <span>%d-%m-%Y</span> &agrave; <span>%H:%i:%s</span>') AS 'date_com' FROM " . $this->table_commentaires . " LEFT JOIN users ON users.id = comments.author WHERE news_id='" . $news . "'")->result_array();
        
    }
    
}