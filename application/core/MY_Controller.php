<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class MY_Controller
 */
class MY_Controller extends CI_Controller {
    
    /**
     *
     * @array
     */
    protected $langredirect = ['french', 'english'];

    /**
     *
     * @array
     */
    private $language = ['fr' => 'french', 'en' => 'english'];

    /**
     * 
     * @return boolean
     */
    public function __construct() {

        parent::__construct ();

        $this->data['NotifLastIPLog'] = false;

        // On charge les fichiers important 
        $this->GetCSS(); //Css
        $this->GetJS(); //JS
        
        // Gestion language
        $this->SetLang();

        // Vérification des bann's IP
        if ($this->General_model->GetIpBanned($this->input->ip_address()) == TRUE) {
            if ($this->uri->segment(3) != "Banned") {
                redirect("Errors/Banned");
            }
        }
        if (($this->session->userdata('logged_in') == FALSE) && ($this->input->cookie('remember_me', TRUE) != NULL)) {
            $this->RememberMe($this->input->cookie('remember_me', true));
        }
        
        // Si l'utilisateur est connecter
        if ($this->session->userdata('logged_in') == TRUE) {
            $this->data['GetNotifTotal'] = $this->GetNotif();
            $this->SetLastActivity();
        }

        // AutoLoad language
        if (file_exists(APPPATH . 'language/' . $this->language[$this->lang->lang()] . '/' . $this->uri->segment(2) . '.php')) {
            $this->lang->load($this->uri->segment(2), '', '', FALSE);
        }
        
        return TRUE;
        
    }
    
    /**
     * 
     * @return string $this
     */
    protected function GetCSS () {
        
        $this->layout->add_includes('css', 'http://fonts.googleapis.com/css?family=Oswald:400,700,300', 1);
        $this->layout->add_includes('css', 'assets/css/font-awesome.css');
        $this->layout->add_includes('css', 'assets/css/bootstrap.css');
        $this->layout->add_includes('css', 'assets/css/style.css');
        
        return $this;
        
    }
    
    /**
     * 
     * @return string $this
     */
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
        $this->layout->add_includes('js', 'assets/js/Helper/metisMenu.js');
        
        /*
         * Other
         */
        $this->layout->add_includes('js', 'assets/js/script.js');
        
        /*
         * Pages
         */
        if (file_exists('assets/js/Page/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '.js')) {
            $this->layout->add_includes('js', 'assets/js/Page/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '.js');
        }
        
        return $this;
        
    }

    /**
     *
     */
    protected function GetNotif () {
        
    }
    
    /**
     * 
     * @return boolean
     */
    protected function SetLang () {
        
        if ($this->uri->segment(1) != FALSE) {
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
            if ($this->uri->segment(1) != FALSE) {
                if ($this->uri->segment(1) != $_COOKIE["lang_choise"]) {
                    $segment_to_replace = "/" . $this->uri->segment(1) . "/";
                    $new_url = str_replace ($segment_to_replace, "/". $_COOKIE["lang_choise"] . "/", current_url());

                    redirect ($new_url);
                }
            }
        }
        
        return TRUE;
        
    }

    /**
     * 
     * @param string $account
     * @return boolean
     */
    protected function RememberMe($account) {

        $this->load->model('Auth_model');

        $this->newdata = [
            'account_id' => $account,
            'account_name' => $this->Auth_model->GetUsername($account),
            'account_ip' => $this->input->ip_address(),
            'logged_in' => TRUE 
        ];

        $this->session->set_userdata($this->newdata);

        redirect($this->uri->uri_string());

        return TRUE;
        
    }
    
    /**
     * 
     * @return boolean
     */
    protected function SetLastActivity () {
        
        $this->load->model('Auth_model');
        
        $this->Auth_model->SetLastActiv($this->session->userdata('account_id'));
        
        return TRUE;
        
    }
        
}