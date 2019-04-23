<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Spbu_model extends MY_Model {

    public $table = 'spbu';

    public function __construct() {
        parent::__construct();
    }
    //bawaan my model plugin
    //waktu insert ke tabel
    public $fillable = array(
        'id',
        'tanggal',
        'regional',
        'witel',
        'kode_spbu',
        'alamat',
        'kota',
        'instalasi',
        'bapp',
        'wfm',
        'mitra',
        'start_instalasi',
        'selesai_instalasi',
        'power',
        'kirim_ho',
        'foto_spbu',
        'foto_instalasi',
        'pelaksana',
        'insert_by',
        'created_at',
        'updated_at',
    );


    public function get_all_dt($filter) {

        $this->datatables->select("
            d.id,d.tanggal,d.regional,d.witel, d.kode_spbu, d.alamat,d.kota,d.instalasi,d.bapp,d.wfm,d.power,d.kirim_ho,d.mitra,d.start_instalasi,
            d.selesai_instalasi,d.pelaksana,d.created_at,d.updated_at
        ")
            ->from("$this->table d")
            ->edit_column('tanggal', '$1', "tanggal")
            ->add_column('action', '$1', "set_actions_choose(id, data)");//langsung pake nama field di database dengan id_soal

        if (!is_null($filter->from_tgl)) {
            $this->datatables->where("d.tgl_ganti >= '$filter->from_tgl'");
            $this->datatables->where("d.tgl_ganti <= '$filter->to_tgl'");
        }
//      json_encode($this->datatables->generate());
        return $this->datatables->generate();
    }

}
