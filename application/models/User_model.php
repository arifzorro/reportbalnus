<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

    public $table = 'user';
    public $fillable = array(
        'username',
        'password',
        'name',
        'role',
        'salt',
        'active',
        'created_at',
        'updated_at',
        'insert_by'
    );
    public function __construct() {
        parent::__construct();
    }

    public function get_all_dt() {
        $this->datatables->select("
            u.id, u.name, u.username, u.active AS status, r.role_name
        ")
            ->from("$this->table u")
            ->join('role_type r', 'r.id=u.role')
            ->edit_column('status', '$1', "show_status(status)")
            ->add_column('action', '$1', "set_actions(id, user)");

        return $this->datatables->generate();
    }

}
