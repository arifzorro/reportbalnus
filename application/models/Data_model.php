<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends MY_Model {

    public $table = 'data';
    public $fillable = array(
        'vendor_id',
        'tgl_ganti',
        'pelanggan_id',
        'pelanggan_telepon',
        'sn_meter_baru',
        'merk_meter_lama',
        'seri_meter_lama',
        'tahun_meter_lama',
        'stan_bongkar',
        'no_segel',
        'pelaksana',
        'insert_by',
        'updated_at',
        'created_at'
    );

    public function __construct() {
        $this->has_one['vendor'] = array('Vendor_model', 'id', 'vendor_id');
        parent::__construct();
    }

    public function get_all_dt($filter) {
        $this->datatables->select("
            d.id, d.tgl_ganti, d.pelanggan_id, d.pelanggan_telepon, d.sn_meter_baru, d.merk_meter_lama, d.seri_meter_lama,
            d.tahun_meter_lama, d.stan_bongkar, d.no_segel, d.pelaksana, v.nama AS nama_vendor,
        ")
            ->from("$this->table d")
            ->join('vendor v', 'v.id=d.vendor_id')
            ->edit_column('tgl_ganti', '$1', "show_date(tgl_ganti)")
            ->add_column('action', '$1', "set_actions(id, data)");

        if (!is_null($filter->from_tgl)) {
            $this->datatables->where("d.tgl_ganti >= '$filter->from_tgl'");
            $this->datatables->where("d.tgl_ganti <= '$filter->to_tgl'");
        }

        return $this->datatables->generate();
    }

}
