<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->auth->filter(ADMIN);

        $this->load->model('user_model');
        $this->load->model('role_model');

        $this->load->helper('datatable');
        $this->load->library('datatables');
    }

    public function index() {
        if ($this->input->is_ajax_request()) {
            return print_r($this->user_model->get_all_dt());
        } else {
            $this->render('user/index');
        }
    }

    public function create() {
        $this->data['roles'] = $this->role_model->get_all();
        $this->render('user/form');
    }

    public function edit($id) {
        $this->data['roles'] = $this->role_model->get_all();
        $this->data['user'] = $this->user_model->get($id);

        if ($this->data['user']) {
            $this->render('user/form');
        } else show_404();
    }

    public function _fetch_data($is_add_state) {
        $store_salt = $this->auth->config->item('store_salt', 'ion_auth');
        $salt       = $store_salt ? $this->auth->salt() : FALSE;
        $data = array(
            'name'      => $this->input->post('name'),
            'username'  => $this->input->post('username'),
            'role'      => $this->input->post('role'),
            'active'    => $this->input->post('active'),
        );

        $password = $this->input->post('password');
        if (!empty_or_null($password))
            $data['password'] = $this->auth->hash_password($password, $salt);

        if ($store_salt) $data['salt'] = $salt;
        $data = array_merge($data, user_timestamps($is_add_state));
        return $data;
    }

    public function save($id = null) {
        $is_add_state = is_null($id);
        $data = $this->_fetch_data($is_add_state);
        if ($is_add_state) {
            $is_success = $this->user_model->insert($data);
        } else {
            $is_success = $this->user_model->update($data, $id);
        }

        if ($is_success) set_flash_message("Data telah tersimpan.");
        else set_flash_message("Data gagal tersimpan.", 'error');

        if ($is_add_state) redirect(base_url('user/create'));
        else redirect(base_url('user'));
    }

    public function delete($id) {
        $success = $this->user_model->delete(array('id' => $id));
        if ($success === FALSE) {
            return NULL;
        } else {
            echo "Data berhasil dihapus.";
        }
    }

}