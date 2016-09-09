<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    protected $langredirect = ['french', 'english'];

    private $language = ['fr' => 'french', 'en' => 'english'];

    public function __construct() {

        parent::__construct ();

        $this->data['NotifLastIPLog'] = false;

        // On charge les fichiers important 
        $this->GetCSS(); //Css
        $this->GetJS(); //JS
        
        // Gestion language
        $this->SetLang();

        // Les variables global
        $this->data['name_site'] = $this->config->item('name_site');
        $this->data['version'] = $this->config->item('version');

        // Vérification des bann's IP
        if ($this->General_model->GetIpBanned($this->input->ip_address()) == TRUE) {
            if ($this->uri->segment(3) != "Banned") {
                redirect("Errors/Banned");
            }
        }

        if (($this->session->userdata('logged_in') === FALSE) && (isset($_COOKIE["remember_me"]))) {
            $this->RememberMe();
        }
        
        // Si l'utilisateur est connecter
        if ($this->session->userdata('logged_in') == TRUE) {
            //$this->data['GetNotifTotal'] = $this->GetNotif();
            //$this->SetLastActivity
        }

        // AutoLoad language
        if (file_exists(APPPATH . 'language/' . $this->language [$this->lang->lang ()] . '/' . $this->uri->segment ( 2 ) . '.php')) {
            $this->lang->load($this->uri->segment ( 2 ), '', '', FALSE);
        }
        
        return TRUE;
        
    }
    
    protected function GetCSS () {
        
        $this->layout->add_includes('css', 'http://fonts.googleapis.com/css?family=Oswald:400,700,300', 1);
        $this->layout->add_includes('css', 'assets/css/Framework/font-awesome.css');
        $this->layout->add_includes('css', 'assets/css/Framework/bootstrap.css');
        //$this->layout->add_includes('css', 'assets/css/Framework/bootstrap-theme.css');
        $this->layout->add_includes('css', 'assets/css/style.css');
        
        return $this;
        
    }
    
    protected function GetJS () {
        
        /*
        * Librairies
        */
        $this->layout->add_includes('js', 'assets/js/Library/jquery.js');
        $this->layout->add_includes('js', 'assets/js/Library/tether.js');
        $this->layout->add_includes('js', 'assets/js/Library/bootstrap.js');
        
        /*
        * Helpers
        */
        $this->layout->add_includes('js', 'assets/js/Helper/html5shiv.js');
        $this->layout->add_includes('js', 'assets/js/Helper/lang.js');
        $this->layout->add_includes('js', 'assets/js/Helper/cookie.js');
        $this->layout->add_includes('js', 'assets/js/Helper/Consol.js');
        
        /*
         * Other
         */
        $this->layout->add_includes('js', 'assets/js/script.js');
        
        return $this;
        
    }
    
    protected function SetLang () {
        
        if ($this->uri->segment(1) !== FALSE) {
            if ($this->uri->segment(2)) { 
                if (file_exists(APPPATH . 'language/' . $this->language[$this->lang->lang()] . '/' . $this->uri->segment(2) . '.php')) {
                    $this->lang->load($this->uri->segment(2), '', '', FALSE);
                }
            }
            else {
                if (file_exists(APPPATH . 'language/' . $this->language[$this->lang->lang()] . '/home.php')) {
                    $this->lang->load("home", '', '', FALSE);
                }
            }
        }
        
        
        if (isset($_COOKIE["lang_choise"])) {
            if ($this->uri->segment(1) !== FALSE) {
                if ($this->uri->segment(1) != $_COOKIE["lang_choise"]) {
                    $segment_to_replace = "/" . $this->uri->segment(1) . "/";
                    $new_url = str_replace ($segment_to_replace, "/". $_COOKIE["lang_choise"] . "/", current_url());

                    redirect ($new_url);
                }
            }
        }
        
        return TRUE;
        
    }

    protected function RememberMe() {

        $this->load->model('Auth_model');

        $this->newdata = [
            'account_id' => $this->input->cookie('remember_me', true),
            'account_name' => $this->Auth_model->GetUsername($this->input->cookie('remember_me', true)),
            'account_ip' => $this->input->ip_address(),
            'logged_in' => TRUE 
        ];

        $this->session->set_userdata($this->newdata);

        redirect($this->uri->uri_string());

        return TRUE;
        
    }
        
}