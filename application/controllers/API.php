<?php

/**
 * Class API
 */
class API extends CI_Controller {

    /**
     * API constructor.
     */
    public function __construct() {

        parent::__construct();

        $this->load->model('Auth_model');

    }

    /**
     * Index controller
     * @return string return base off JSON
     */
    public function index () {

        return $this->output->set_content_type('application/json')->set_output(json_encode($this->GetInfo()));

    }

    /**
     * Vérify if Username exist
     * @return string AccountID & Result
     */
    public function GetUsernameExists () {

        $this->array = $this->GetInfo();

        if ($this->Auth_model->GetUsernameExists($_POST['username']) > 0) {
            $this->array["Result"] = 1;
            $this->array["AccountID"] = $this->Auth_model->GetUsernameExists($_POST['username']);
        }
        else {
            $this->array["Result"] = 0;
        }

        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));

    }

    /**
     * Get username by Account ID
     * @return string username
     */
    public function GetUsernameByID () {
        $this->array = $this->GetInfo();
        $this->array["AccountUsername"] = $this->Auth_model->GetUsername($_POST['accountID']);
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
    }

    /**
     * Get email if exist
     * @return string AccountID & Result
     */
    public function GetEmailExists () {

        $this->array = $this->GetInfo();

        if ($this->Auth_model->GetEmailExists($_POST['email']) > 0) {
            $this->array["Result"] = 1;
            $this->array["AccountID"] = $this->Auth_model->GetEmailExists($_POST['email']);
        }
        else {
            $this->array["Result"] = 0;
        }

        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));

    }

    /**
     * Vérify if Password is correct
     * @return string Result
     */
    public function GetPasswordCorrect () {
        $this->array = $this->GetInfo();

        if (password_verify($_POST['password'], $this->Auth_model->GetPasswordCorrect($_POST['account']))) {
            $this->SetSession($_POST['account'], $_POST['remember']);
            $this->array["Result"] = 1;
        } else {
            $this->array["Result"] = 0 ;
        }
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
    }

    /**
     *
     * Logout USER
     *
     * @return string
     */
    public function SetLogout () {

        $this->load->helper('cookie');

        delete_cookie("remember_me");

        $this->session->sess_destroy();

        $this->array = $this->GetInfo();
        $this->array["Result"] = 1;

        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
    }

    /**
     *
     * Set the session
     *
     * @param string $account
     * @param string $remember
     * @return boolean
     */
    private function SetSession ($account, $remember) {

        $this->DataSession = [
            'account_id' => $account,
            'account_name' => $this->Auth_model->GetUsername($account),
            'account_ip' => $this->input->ip_address(),
            'logged_in' => TRUE
        ];

        if ($remember == 1) {
            $this->load->helper('cookie');
            $this->DataCookie = [
                'name'   => 'remember_me',
                'value'  => $account,
                'expire' => '32140800',
            ];
            $this->input->set_cookie($this->DataCookie, TRUE);
            $this->config->set_item('sess_expiration', '32140800');
            $this->session->sess_expiration = '32140800';
        }

        $this->session->set_userdata($this->DataSession);

        return TRUE;
    }

    /* CHATBOX */

    /**
     *
     * Get all message of chatbox in AJAX
     *
     * @param string $after
     * @return string
     */
    public function GetChatbox ($after = 0) {
        $this->array = $this->GetInfo();
        if($this->General_model->get_message_chatbox($after)->num_rows() > 0) {
            $this->array['chatbox'] = $this->General_model->get_message_chatbox($after)->result_array();
        }
        else {
            $this->array['chatbox'] = "0";
        }
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
    }

    /**
     *
     * Add new chat
     *
     * @return string
     */
    public function AddMessageChatbox () {
        $this->array = $this->GetInfo();
        if ($this->getauthorisation()) {
            $this->array['chatbox'] = array("id" => $this->General_model->add_message_chatbox($_POST['message'], $this->session->userdata("account_id")), "avatar" => $this->Auth_model->GetAvatar($this->session->userdata("account_id")), "user" => $this->Auth_model->GetUsername($this->session->userdata("account_id")), "msg" => $_POST['message'], "time" => "Le <span>" . date('d-m-Y') . "</span> &agrave; <span>" . date('H:i:s') . "</span>");
        }
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
    }
    /* CHATBOX */
    
    /* COMMENTS */
    /**
     * 
     * ADD new comments
     * 
     * @return string
     */
    public function AddComInNews () {
        $this->load->model('Home_model');
        $this->array = $this->GetInfo();
        if ($this->getauthorisation()) {
            $this->authordetect = $this->session->userdata("account_id");
        }
        else {
            $this->authordetect = 0;
        }
        //$this->authordetect =
        $this->array['CommID'] = $this->Home_model->AddComNews($_POST['news'], $_POST['message'], $this->authordetect);
        return $this->output->set_content_type('application/json')->set_output(json_encode($this->array));
    }
    /* COMMENTS */

    /**
     *
     * Get JSON info
     *
     * @return string
     */
    private function GetInfo () {

        return ["API version" => "v1", "token" => $this->security->get_csrf_hash()];

    }
    
    /**
     * 
     * Vérify authorisation for API
     * 
     * @return boolean
     */
    private function getauthorisation () {
        if ($this->session->userdata('logged_in') == TRUE) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

}
