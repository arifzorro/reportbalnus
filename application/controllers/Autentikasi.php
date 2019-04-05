<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends MY_Controller {

    //const LOGIN_SUCCESS_REDIRECT = "data/create";
    const LOGIN_SUCCESS_REDIRECT = "data/inputdatagpon";
    const LOGIN_URI = "autentikasi/login";

    public function __construct() {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library(array('form_validation'));
    }

    /**
     * handle login user
     */
	public function login() {
	    // jika telah login, redirect ke dashboard
        if ($this->auth->is_login()) {
            redirect(self::LOGIN_SUCCESS_REDIRECT);
        }
        else {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                $remember = (bool) $this->input->post('remember');

                // jika berhasil login
                if ($this->auth->login($this->input->post('username'), $this->input->post('password'), $remember)) {
                    redirect(self::LOGIN_SUCCESS_REDIRECT);
                } else {
                    $this->session->set_flashdata('message', $this->auth->errors());
                    redirect(self::LOGIN_URI, 'refresh');
                }
            } else {
                $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->load->view('login', $data);
            }
        }
	}

	public function logout() {
	    $this->auth->logout();
    }
}
