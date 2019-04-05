<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_gpon_model extends MY_Model {

    public $table = 'datagpon';

    public function __construct() {
        parent::__construct();
    }
    //bawaan my model plugin
    public $fillable = array(
        'id',
        'ipgpon',
        'tipe_gpon',
        'modul',
        'slot',
        'port',
        'ruang_ea',
        'slot_ftbea',
        'port_ftbea',
        'ruang_oa',
        'slot_ftboa',
        'port_ftboa',
        'sto',
        'odc',
        'listodp',
        'tanggal',
        'pelaksana',
        'insert_by',
        'created_at',
        'updated_at',
    );


    public function get_all_dt($filter) {

        $this->datatables->select("
            d.id,d.ipgpon,d.modul,d.slot, d.port, d.ruang_ea,d.slot_ftbea,d.port_ftbea,d.ruang_oa,d.slot_ftboa,d.port_ftboa,d.sto,d.odc,d.listodp,
            d.tanggal,d.pelaksana,d.created_at,d.tipe_gpon
        ")
            ->from("$this->table d")
            ->edit_column('tanggal', '$1', "show_date(tanggal)")
            ->add_column('action', '$1', "set_actions(id, data)");//langsung pake nama field di database dengan id_soal

        if (!is_null($filter->from_tgl)) {
            $this->datatables->where("d.tgl_ganti >= '$filter->from_tgl'");
            $this->datatables->where("d.tgl_ganti <= '$filter->to_tgl'");
        }
        //dd($this->datatables->generate());
        return $this->datatables->generate();
    }

}
