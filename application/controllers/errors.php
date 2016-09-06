<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends MY_Controller {
    
    protected $data = [];
    
    public $title_for_layout, $breadcrumbs;

    public function __construct() {

        parent::__construct ();

        $this->lang->load("Errors", '', '', FALSE);

        $this->breadcrumbs = "<li><a href='" . base_url () . "Errors'>Erreur</a></li>";

        return TRUE;

    }

    public function index() {

        return redirect ( 'Errors/error_404' );

    }

    public function error_404() {

        $this->breadcrumbs .= "<li class='active'>" . lang('Title_Page_Error_404') . "</li>";
        $this->title_for_layout = lang('Title_Page_Error_404');

        return $this->layout->view('Errors/html/error_404');

    }

    public function Code($id = null) {

        //1 = API token non trouver
        return redirect('Errors/404');

    }
}