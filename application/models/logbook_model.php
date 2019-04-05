<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logbook_model extends MY_Model {

    public $table = 'logbook';

    public function __construct() {
        parent::__construct();
    }
    //bawaan my model plugin
    public $fillable = array(
        'id',
        'tanggal',
        'sto',
        'odc',
        'uraian',
        'pelaksana',
        'insert_by',
        'updated_at',
        'created_at'
    );


    public function get_all_dt($filter) {
        $this->datatables->select("
            d.id, d.tanggal, d.uraian, d.pelaksana,d.sto,d.odc,d.created_at
        ")
            ->from("$this->table d")
            ->edit_column('created_at', '$1', "show_date_change_format(created_at)")  //ini untuk edit created at
            ->add_column('action', '$1', "set_actionslog(id, data)");//langsung pake nama field di database dengan id_soal

        if (!is_null($filter->from_tgl)) {
            $this->datatables->where("d.tgl_ganti >= '$filter->from_tgl'");
            $this->datatables->where("d.tgl_ganti <= '$filter->to_tgl'");
        }
        //dd($this->datatables->generate());
        return $this->datatables->generate();
    }

}
