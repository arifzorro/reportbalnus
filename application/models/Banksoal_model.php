<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banksoal_model extends MY_Model {

    public $table = 'bank_soal';

    public function __construct() {
        parent::__construct();
    }
    //bawaan my model plugin
    public $fillable = array(
        'id_soal',
        'soal',
        'a',
        'b',
        'c',
        'd',
        'e',
        'tanggal',
        'kategori',
        'pelaksana',
        'insert_by',
        'updated_at',
        'created_at'
    );


    public function get_all_dt($filter) {
        $this->datatables->select("
            d.id_soal, d.soal, d.a, d.b, d.c, d.d, d.e,
            d.tanggal, d.pelaksana,d.kategori
        ")
            ->from("$this->table d")
            ->edit_column('tanggal', '$1', "show_date(tanggal)")
            ->add_column('action', '$1', "set_actions(id_soal, data)");//langsung pake nama field di database dengan id_soal

        if (!is_null($filter->from_tgl)) {
            $this->datatables->where("d.tgl_ganti >= '$filter->from_tgl'");
            $this->datatables->where("d.tgl_ganti <= '$filter->to_tgl'");
        }
        //dd($this->datatables->generate());
        return $this->datatables->generate();
    }

}
