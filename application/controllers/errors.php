<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Errors
 */
class Errors extends MY_Controller {

    /**
     * @var array
     */
    public $data = [];

    /**
     * @var string
     */
    public $title_for_layout;
    /**
     * @var string
     */
    public $breadcrumbs;

    /**
     * Errors constructor.
     * @return boolean
     */
    public function __construct() {

        parent::__construct ();
        
        $this->title_spage = "Error";

        $this->lang->load("Errors", '', '', FALSE);

        $this->breadcrumbs = "<li><a href='" . base_url () . "Errors'>Erreur</a></li>";

        return TRUE;

    }

    /**
     * return string
     */
    public function index() {

        return redirect ( 'Errors/error_404' );

    }

    /**
     * @return mixed
     */
    public function error_404() {

        $this->breadcrumbs .= "<li class='active'>" . lang('Title_Page_Error_404') . "</li>";
        $this->title_for_layout = lang('Title_Page_Error_404');

        return $this->layout->view('Errors/html/error_404');

    }

    /**
     * @param int $id
     */
    public function Code($id = null) {

        //1 = API token non trouver
        return redirect('Errors/404');

    }
}