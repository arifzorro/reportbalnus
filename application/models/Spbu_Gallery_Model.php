<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spbu_Gallery_Model extends MY_Model {

    public $table = 'spbu_gallery';

    public function __construct() {
        parent::__construct();
    }
    //bawaan my model plugin
    //waktu insert ke tabel
    public $fillable = array(
        'id',
        'filename_spbu',
        'filename_instalasi',

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
