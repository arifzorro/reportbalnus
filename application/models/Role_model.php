<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends MY_Model {

    public $table = 'role_type';

    public function __construct() {
        parent::__construct();
    }

}
