<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Layout {
    
    private $includes, $ci, $view, $datas;
    
    public function __construct() {
        
        $this->ci = &get_instance();
        $this->includes = [];
        
        return TRUE;
        
    }
    
    public function add_includes($type, $file, $extern = 0, $options = NULL) {
        
        if ($extern == 0) {
            $this->includes[$type][] = [
                'file' => base_url() . $file,
                'options' => $options 
            ];
        } else {
            $this->includes[$type][] = [
                'file' => $file,
                'options' => $options 
            ];
        }

        return $this;
    }
    
    private function set_title() {
        
        $this->titles = $this->ci->config->item('name_site');
        
        $this->limiter = " :: ";
        
        $this->title_controller = $this->ci->title_for_layout;
        
        $this->stitle = $this->ci->title_spage;

        if ($this->stitle !== FALSE) {
            return $this->title = $this->titles . $this->limiter . $this->stitle;
        } else {
            return $this->title = $this->titles;
        }
        
    }


    private function get_breadcrumbs() {
        
        if (!$this->ci->uri->segment(2) OR (in_array($this->ci->uri->segment(2), ["Home", "home"]) and !$this->ci->uri->segment(3))) {
            
            $this->data_breadcrumbs = ('<li><i class="fa fa-home" aria-hidden="true"></i> Accueil</li>');
            
        }
        else {
            
            $this->data_breadcrumbs = ('<li><a href="' . base_url() . 'Home"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>');
            
            $this->data_breadcrumbs .= ('<li><a href="' . base_url() . $this->ci->uri->segment(2) . '">' . $this->ci->title_for_layout . '</a></li>');
            
            if($this->ci->uri->segment(3) == TRUE && $this->ci->title_spage != FALSE) {
                $this->data_breadcrumbs .= ('<li>' . $this->ci->title_spage . '</li>');
            }
            
        }
        
        return $this->data_breadcrumbs;
        
    }
    
    public function view($name, $data = [], $layout = 'default') {
        
        // $obj->cache->save('data', $data, 3600);
        $this->view = $this->ci->load->view($name, $data, TRUE);

        $this->datas =  [
            'title' => $this->set_title(),
            'title_page' => $this->ci->title_for_layout,
            'includes_for_layout' => $this->includes,
            'breadcrumbs' => $this->get_breadcrumbs(),
            'content_for_layout' => $this->ci->load->view($name, $data, TRUE)
        ];

        $this->output = $this->ci->load->view('layouts/' . $layout, $this->datas);

        return $this->output;
        
    }
    
}