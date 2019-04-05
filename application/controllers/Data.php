<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_model');
        $this->load->model('vendor_model');
        $this->load->model('data_gpon_model');
        $this->load->model('logbook_model');
        //model buatan manual
        $this->load->model('Chart_model');
        $this->load->model('excel_import_model');

        $this->load->helper('datatable');
        $this->load->library('datatables');
        //library excel
        $this->load->library('ExcelLibrary/excel');

    }

    public function not_allowed()
    {
        $this->load->view('not_allowed');
    }

    public function index()
    {

        if ($this->input->is_ajax_request()) {

            $from_tgl = $this->input->post('from_tgl');
            $to_tgl = $this->input->post('to_tgl');
            $filter = (object)array(
                'from_tgl' => !empty_or_null($from_tgl) ? set_date($from_tgl) : null,
                'to_tgl' => !empty_or_null($to_tgl) ? set_date($to_tgl) : (!empty_or_null($from_tgl) ? set_date($from_tgl) : null),
            );
            //var_dump($this->data_gpon_model->get_all_dt($filter));
            return print_r($this->data_gpon_model->get_all_dt($filter));
        } else {
            $this->render('data/index');
        }
    }

    public function listlog()
    {

        if ($this->input->is_ajax_request()) {

            $from_tgl = $this->input->post('from_tgl');
            $to_tgl = $this->input->post('to_tgl');
            $filter = (object)array(
                'from_tgl' => !empty_or_null($from_tgl) ? set_date($from_tgl) : null,
                'to_tgl' => !empty_or_null($to_tgl) ? set_date($to_tgl) : (!empty_or_null($from_tgl) ? set_date($from_tgl) : null),
            );
            json_encode($this->data_gpon_model->get_all_dt($filter));

            return print_r($this->logbook_model->get_all_dt($filter));
        } else {
            $this->render('data/listlog');
        }
    }

    public function create()
    {

        $this->data['vendor'] = $this->vendor_model->get(1);
        //var_dump($this->vendor_model->get(1));
        $this->render('data/form');
    }
//    public function inputsoal(){
//        //$this->data['vendor'] = $this->vendor_model->get(1);
//     //   dd($this->data['vendor']);
//      //  var_dump($this->vendor_model->get(1));
//       $this->render('data/formsoal');
//    }

    public function inputdatagpon()
    {
        // echo time();
        //$this->data['vendor'] = $this->vendor_model->get(1);
        //   dd($this->data['vendor']);
        //  var_dump($this->vendor_model->get(1));

//percobaan untuk set waktu time zone
//        $timezone = date_default_timezone_get();
//        echo "The current server timezone is: " . $timezone;
//        $time=$_SERVER['REQUEST_TIME'];
//        echo $time;
//        date_default_timezone_set('Etc/GMT-8');
//        $date = date('d/m/Y h:i:s a', time());
//        echo $date;

        $this->render('data/formgpon');
    }

    public function logbook()
    {
        $this->render('data/formlogbook');
    }

    public function edit($id)
    {
        //dd($id);
        //CODE RAMA
//        $this->data['data'] = $this->data_model->with_vendor()->get($id);
//        $this->data['vendor'] = $this->data['data']->vendor;
//        $this->render('data/formsoal');
        //var_dump($id);
        //maksudnya
        $this->data['data'] = $this->data_gpon_model->get($id);
        var_dump($this->data['data']);
        //$this->data['vendor'] = $this->data['data']->vendor;
        //var_dump($this->data['vendor']);
        $this->render('data/formgpon');
    }


    public function editlog($id)
    {
        //dd($id);
        //CODE RAMA
//        $this->data['data'] = $this->data_model->with_vendor()->get($id);
//        $this->data['vendor'] = $this->data['data']->vendor;
//        $this->render('data/formsoal');
        //var_dump($id);
        //maksudnya
        $this->data['data'] = $this->logbook_model->get($id);
        var_dump($this->data['data']);
        //$this->data['vendor'] = $this->data['data']->vendor;
        //var_dump($this->data['vendor']);
        $this->render('data/formlogbook');
    }

    public function _fetch_data($is_add_state)
    {
        $data = $this->input->post();

        $data['tanggal'] = set_date($data['tanggal']);
        //dd($data['tanggal']);
        $data = array_merge($data, user_timestamps($is_add_state));
        //dd($data);
        return $data;
    }
    public function _fetch_data_with_change_date_format($is_add_state)
    {
        $data = $this->input->post();

        $data['tanggal'] = set_date_changeformat($data['tanggal']);
        //dd($data['tanggal']);
        $data = array_merge($data, user_timestamps($is_add_state));
        //dd($data);
        return $data;
    }


    public function save($id = null)
    {
        $is_add_state = is_null($id);
        $data = $this->_fetch_data($is_add_state);
        // dd($data);
        //$kategori=$_POST['']
        // dd($data);
        //   dd($id);
        //dd($is_add_state);
        if ($is_add_state) {

            $is_success = $this->data_gpon_model->insert($data);
        } else {
            $is_success = $this->data_gpon_model->update($data, $id);
        }
        //var_dump('akses');
        if ($is_success) set_flash_message("Data telah tersimpan.");
        else set_flash_message("Data gagal tersimpan.", 'error');

        if ($is_add_state) redirect(base_url('data/inputdatagpon'));
        else redirect(base_url('data'));
    }

    public function delete($id)
    {
        $success = $this->data_gpon_model->delete(array('id' => $id));
        if ($success === FALSE) {
            return NULL;
        } else {
            echo "Data berhasil dihapus.";
        }
    }

    public function deletelog($id)
    {
        $success = $this->logbook_model->delete(array('id' => $id));
        if ($success === FALSE) {
            return NULL;
        } else {
            echo "Data berhasil dihapus.";
        }
    }


    public function savelog($id = null)
    {
        $is_add_state = is_null($id);
        $data = $this->_fetch_data_with_change_date_format($is_add_state);
         //dd($data);
        //$kategori=$_POST['']
        // dd($data);
        //   dd($id);
        //dd($is_add_state);
        if ($is_add_state) {

            $is_success = $this->logbook_model->insert($data);
        } else {
            $is_success = $this->logbook_model->update($data, $id);
        }
        //var_dump('akses');
        if ($is_success) set_flash_message("Data telah tersimpan.");
        else set_flash_message("Data gagal tersimpan.", 'error');

        if ($is_add_state) redirect(base_url('data/logbook'));
        else redirect(base_url('data/listlog'));
    }

    public function chart()
    {

        //$this->data=$this->Chart_model->fetch_data();
//       var_dump($this->data);
//       echo $this->data->tanggal;


        //tes dari php ke javascrip
//        $from_tgl   = $this->input->post('from_tgl');
//        $to_tgl     = $this->input->post('to_tgl');
//        $filter = (object) array(
//            'from_tgl' => !empty_or_null($from_tgl) ? set_date($from_tgl) : null,
//            'to_tgl' => !empty_or_null($to_tgl) ? set_date($to_tgl) : (!empty_or_null($from_tgl) ? set_date($from_tgl) : null),
//        );
        //mengambil data
//        $this->data=$this->logbook_model->get_all_dt($filter);
//        echo $this->data->tanggal;
        //var_dump($this->data);


        //cara melihat isi objek di json
        //  $json_object=json_decode($this->data);
        //  var_dump($json_object->data);

        //  print_r($this->logbook_model->get_all_dt($filter));

//        foreach ($this->data as $kotak){
//            echo $kotak[1];
//        }


        $this->render('chart/chartmodifcoba');
        // $this->load->view('chart/chartmodif');

    }

    public function ambildatachart()
    {


        //tes dari php ke javascrip
        $from_tgl = $this->input->post('from_tgl');
        $to_tgl = $this->input->post('to_tgl');
        $filter = (object)array(
            'from_tgl' => !empty_or_null($from_tgl) ? set_date($from_tgl) : null,
            'to_tgl' => !empty_or_null($to_tgl) ? set_date($to_tgl) : (!empty_or_null($from_tgl) ? set_date($from_tgl) : null),
        );
        //mengambil data
        //$this->data=$this->logbook_model->get_all_dt($filter);//jgn pake fungsi yang ini keluarannya g' seperti array tapi object
//        $this->data['data']=$this->logbook_model->get_all()->order_by("tanggal", 'ASC');  //error
//        $this->data['data']=$this->logbook_model->get_all()->order_by("tanggal", 'ASC');
        //$this->data['data']=$this->logbook_model->get_all();
//        return $this->db->where('username', $username)
//                ->group_by("id")
//                ->order_by("id", "ASC")
//                ->limit(1)
//                ->count_all_results($this->tables['users']) > 0;

        //echo json_encode($this->data['data']->tanggal);

        //menggunakan chartmodel
//        $this->data['data']=$this->Chart_model->fetch_data();
//        echo json_encode($this->data['data']);

//        $this->data=$this->Chart_model->fetch_data();
//        echo json_encode($this->data);

        $save = $this->Chart_model->fetch_data();
        echo json_encode($save);


    }

    public function import_excel()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
//                    $no = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $tanggal = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $convert_tanggal=set_date_changeformat_indo_to_us($tanggal);
//                    echo json_encode("ini adalah= ".$tanggal);
                    //echo json_encode("".$tanggal);

                    $sto = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $odc = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $uraian = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $pelaksana = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $data[] = array(
//                        'no' => $no,
                        'Tanggal' => $convert_tanggal,
                        'STO' => $sto,
                        'ODC' => $odc,
                        'Uraian' => $uraian,
                        'Pelaksana' => $pelaksana
                    );
                }
            }
            $this->excel_import_model->insert($data);
            echo 'Data Imported successfully';
//            foreach($data as $row)
//            {
//            echo json_encode( $row["Tanggal"] );
//
//            }

            //var_dump($data);
            //echo json_encode($data);
        }

    }
    public function Input_Gpon()
    {
        $this->render('data/formg_data_gpon');
    }
}