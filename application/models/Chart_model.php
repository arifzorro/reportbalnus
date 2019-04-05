<?php
/**
 * Created by PhpStorm.
 * User: arfzorro
 * Date: 1/1/2019
 * Time: 8:11 AM
 */

Class Chart_model extends CI_Model{

    public $title;
    public $content;
    public $date;
    public $table="logbook";

    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function insert_entry()
    {
        $this->title    = $_POST['title']; // please read the below note
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    public function fetch_data(){
       // $query=$this->db->query("select * from ".$this->table." order_by ('tanggal','asc')");//kenapa ini salah fungsi order by dari CI g' bisa
       // $query=$this->db->query("select * from ".$this->table." order by tanggal DESC");  //ini bener
        //SELECT tanggal,COUNT(*) AS jumlah_harian FROM logbook GROUP BY tanggal

        $query=$this->db->query("select tanggal,COUNT(*) AS jumlah_kunjungan from ".$this->table." GROUP BY tanggal ORDER BY TANGGAL DESC LIMIT 7");
//        dd(query);
  //      $data=array();

//       $data[]=$query->result_array();
//       return $data;

//       $data['records']=$query->result_array();
//       return  $data['records'];

        $records=$query->result();
        return $records;



        //contoh query
//        $this->db->from($this->table_name);
//        $this->db->order_by("name", "asc");
//        $query = $this->db->get();
//        return $query->result();
    }
}