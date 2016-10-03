<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

/**
 * Class Home
 */
class Home extends MY_Controller {

    /**
     * @var array
     */
    public $data = [];

    /**
     * Home constructor.
     */
    public function __construct() {

        parent::__construct();
        
        $this->title_spage = "Home";

        $this->load->model('Home_model');

        return TRUE;

    }

    /**
     * @return mixed
     */
    public function index() {

        $this->title_for_layout = ('Accueil');
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url() . 'fr/Home/index';
        $config['total_rows'] = $this->Home_model->GetTotalRows();
        $config["per_page"] = 6;
        $config["uri_segment"] = 4;
        $config["num_links"] = round($config["total_rows"] / $config["per_page"]);
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $config['anchor_class'] = 'follow_link';
        
        $this->pagination->initialize($config);
        
        $this->page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['GetListeNews'] = $this->Home_model->GetNewsliste($config["per_page"], $this->page);

        return $this->layout->view ('pages/Home', $this->data);

    }
    
    /**
     * 
     * Get news by ID
     * 
     * @param INT $id
     * @return string
     */
    public function News ($id = 0) {
        
        $this->news_row = $this->Home_model->GetNews($id);
        
        $this->title_for_layout = ('News');
        
        $this->title_spage = $this->news_row->titre;
        
        $this->data['News_id'] = $this->news_row->id;
        $this->data['News_title'] = $this->news_row->titre;
        $this->data['News_content'] = $this->news_row->news;
        $this->data['News_time'] = $this->news_row->date_created;
        $this->data['News_authorID'] = $this->news_row->author;
        $this->data['News_author'] = $this->news_row->username;
        
        $this->data['Commentaire_all'] = $this->Home_model->GetCommentaires($this->news_row->id);
        
        return $this->layout->view ('pages/News', $this->data);
        
        
    }
    
}
