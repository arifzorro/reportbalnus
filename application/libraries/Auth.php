<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'third_party/ion_auth/libraries/Ion_auth.php');
require_once(APPPATH.'config/constants.php');

class Auth extends Ion_auth {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function in_group($check_group, $id = FALSE, $check_all = FALSE) {
        $id || $id = $this->session->userdata('user_id');

        if (!is_array($check_group))
        {
            $check_group = array($check_group);
        }
        return in_array($this->get_role(), $check_group);

    }

    /**
     * @return bool TRUE jika sudah login, FALSE jika belum
     */
    public function is_login() {
        return parent::logged_in();
    }

    /**
     * @param string/array $role spesifikasi pengguna
     * @param bool $bypass_admin TRUE jika mau bypass admin, FALSE jika ndak
     * @return bool TRUE jika sudah login dan sesuai dengan unitnya, FALSE jika belum login atau tidak sesuai jenisnya
     */
    public function has_role($role, $bypass_admin = TRUE) {
        if (!$this->is_login()) return FALSE; // cek sudah login atau belum
        if ($bypass_admin) {
            if ($this->is_administrator()) return TRUE; // bypass admin
        }

        if ($this->in_group($role) || in_array(ALL_ROLE, $role)) {
            return TRUE;
        } return FALSE;
    }

    /**
     * autentikasi user di contstructor
     *
     * @param string/array $roles
     * @param string/array $except url yg ingin di bypass dari autentikasi
     */
    public function filter($roles = NULL, $except = NULL) {
        $roles = cast_to_array($roles);
        $except = cast_to_array($except);
        $route = uri_string();
        if ((!$this->has_role($roles)) && (!empty($route) && !in_array($route, $except))) {
            if ($this->is_login())
                show_not_allowed();
            else redirect(base_url());
        }
    }

    /**
     * @param string $username
     * @param string $password
     * @param bool $remember
     */
    public function login($username, $password, $remember) {
        parent::login($username, $password, $remember);
    }

    public function logout($redirect = '/') {
        parent::logout();
        redirect($redirect);
    }

    /**
     * @param int $id id pengguna
     * @return mixed informasi user
     */
    public function get_user($id = NULL) {
        return parent::user($id)->row();
    }

    /**
     * @return bool TRUE jika pengguna adalah administrator, FALSE jika bukan
     */
    public function is_administrator() {
        return parent::is_admin();
    }

    /**
     * @param string/array $unit nama unit
     * @param bool $except_unit
     * @param bool $bypass_admin unit
     * @return bool TRUE jika pengguna adalah user, FALSE jika bukan
     */
    public function is_user($unit = NULL, $except_unit = FALSE,  $bypass_admin = TRUE) {
        return $this->has_role(USER, $unit, $except_unit, $bypass_admin);
    }

    public function get_user_session() {
        return array(
            'user_id'       => $this->get_user_id(),
            'role'          => $this->get_role(),
            'username'      => $this->get_username(),
        );
    }

    public function get_user_id() {
        return parent::get_user_id();
    }

    public function get_role() {
        $val = $this->session->userdata('role_name');
        return (!empty($val)) ? $val : NULL;
    }

    public function get_username() {
        $val = $this->session->userdata('username');
        return (!empty($val)) ? $val : NULL;
    }

    public function get_name() {
        $val = $this->session->userdata('name');
        return (!empty($val)) ? $val : NULL;
    }
}