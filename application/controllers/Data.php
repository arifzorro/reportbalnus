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
        $this->load->model('Data_Spbu_model');
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
        //coba aja tes uploadwwww
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

    public function _fetch_data_with_status($is_add_state,$array_status)
    {
        $data = $this->input->post();

        $data['tanggal'] = set_date($data['tanggal']);
        $data['start_instalasi']=set_date($data['start_instalasi']);
        $data['selesai_instalasi']=set_date($data['selesai_instalasi']);
        //dd($data['tanggal']);
        $data = array_merge($data,$array_status,user_timestamps($is_add_state));
//        dd($data);
        return $data;
    }
    public function _fetch_data_with_status_and_dir($is_add_state,$array_status,$file_name)
    {
        $data = $this->input->post();

        $data['tanggal'] = set_date($data['tanggal']);
        $data['start_instalasi']=set_date($data['start_instalasi']);
        $data['selesai_instalasi']=set_date($data['selesai_instalasi']);
        //dd($data['tanggal']);
        $data = array_merge($data,$array_status,$file_name,user_timestamps($is_add_state));
//        dd($data);
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
    public function form_spbu()
    {

//        if( $this->uri->segment(2) =="form_spbu" ){
//            echo 'tes';
//        }
//        else{
//            echo "salah";
//        }
      // echo $this->uri->segment(2);
       $this->render('data/formspbu');
    }
    public function report_spbu()
    {
       // ($this->config->base_url());  //mengambil base url

        if ($this->input->is_ajax_request()) {

            $from_tgl = $this->input->post('from_tgl');
            $to_tgl = $this->input->post('to_tgl');
            $filter = (object)array(
                'from_tgl' => !empty_or_null($from_tgl) ? set_date($from_tgl) : null,
                'to_tgl' => !empty_or_null($to_tgl) ? set_date($to_tgl) : (!empty_or_null($from_tgl) ? set_date($from_tgl) : null),
            );

            json_encode($this->Data_Spbu_model->get_all_dt($filter));

            return print_r($this->Data_Spbu_model->get_all_dt($filter));
        } else {
            $this->render('data/list_report_spbu');
        }
    }

    public function save_spbu($id = null ){
   //     $target_dir =$_SERVER['DOCUMENT_ROOT']."/reportbalnus/public/upload_file/";
    //    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      //  dd($target_file);
      //  $path ="http://" . $_SERVER['HTTP_HOST']; //hasilnya localhost
       // $path= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']); //hasilnya base url http://localhost/reportbalnus/public/
       // dd($path);
       // $file_name_spbu = $_FILES['instalasi']['name'];
//        $file_name_instalasi=$_FILES['instalasi']['name'];
       // $file_name=$this->input->post("spbu");
        $path ="http://" . $_SERVER['HTTP_HOST'];
        $path.= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $path.="upload_file";
        $file_name_instalasi=$this->input->post("foto_instalasi");
        $file_name_spbu=$this->input->post("foto_spbu");
    //   $file_name_instalasi=$this->input->post("instalasi");
      //  dd($file_name_spbu);
      //  dd($path);

        $status_instalasi=$this->input->post('instalasi');  //cara code igniter mengambil data dari tag html
        $status_bapp=$this->input->post('bapp');
        $status_wfm=$this->input->post('wfm');
        $status_power=$this->input->post('power');
//        dd($status_power);
        $status_kirim=$this->input->post('kirim_ho');
        if($status_instalasi=="instalasi"){
            $status_instalasi="OK";
        }
        else{
            $status_instalasi="NOK";
        }
        if($status_bapp =="bapp"){
            $status_bapp ="OK";
        }
        else{
            $status_bapp ="NOK";
        }
        if($status_wfm == "wfm"){
            $status_wfm ="OK";
        }
        else{
            $status_wfm ="NOK";
        }
        if($status_power == "power"){
            $status_power ="OK";
        }
        else{
            $status_power ="NOK";
        }
        if($status_kirim== "kirim_ho"){
            $status_kirim ="OK";
        }
        else{
            $status_kirim ="NOK";
        }

        //array assosiatig
        $array_status=array("instalasi"=>$status_instalasi,"bapp"=>$status_bapp,"wfm"=>$status_wfm,"power"=>$status_power,"kirim_ho"=>$status_kirim);
        $array_filename=array("foto_instalasi"=>$file_name_instalasi,"foto_spbu"=>$file_name_spbu);
       // dd($array_directory);
        $is_add_state = is_null($id);
        $this->checkingfileupload($array_filename);

        $data = $this->_fetch_data_with_status_and_dir($is_add_state,$array_status,$array_filename);
//        dd($data);
        //$kategori=$_POST['']
//        dd($data);
        //dd($id);
        //dd($is_add_state);
        if ($is_add_state) {
            $is_success = $this->Data_Spbu_model->insert($data);
        } else {
            $is_success = $this->Data_Spbu_model->update($data, $id);
        }
        //var_dump('akses');
        if ($is_success) set_flash_message("Data telah tersimpan.");
        else set_flash_message("Data gagal tersimpan.", 'error');

        if ($is_add_state) redirect(base_url('data/report_spbu'));
        else redirect(base_url('data/report_spbu'));
    }

    public function edit_spbu($id)
    {
        //dd($id);
        //CODE RAMA
//        $this->data['data'] = $this->data_model->with_vendor()->get($id);
//        $this->data['vendor'] = $this->data['data']->vendor;
//        $this->render('data/formsoal');
        //var_dump($id);
        //maksudnya
        $this->data['data'] = $this->Data_Spbu_model->get($id);
        //var_dump($this->data['data']);
        //$this->data['vendor'] = $this->data['data']->vendor;
        //var_dump($this->data['vendor']);
        $this->render('data/formspbu');
    }
    public function delete_spbu($id)
    {
        $success = $this->Data_Spbu_model->delete(array('id' => $id));
        if ($success === FALSE) {
            return NULL;
        } else {
            echo "Data berhasil dihapus.";
        }
    }

    public function testing()
    {
        $this->render('testing/tes');
    }

    public function checkingfileupload($array_filename)
    {
        $limit = 10 * 1024 * 1024;
       // dd(isset($_FILES['foto_instalasi']));
       // if (isset($_FILES['foto_instalasi']) && isset($_FILES['foto_spbu'])) {  //pengecekan isset g' jalan
            //karena ada multiple, jadi dilakukan pengecekan foreach
            $jumlahFile = count($array_filename);
            dd($jumlahFile);
            for ($i = 0; $i < $jumlahFile; $i++) {
                $namafile = $_FILES['upload']['name'][$i];
                $tmp = $_FILES['upload']['tmp_name'][$i];
                $type = $_FILES['upload']['type'][$i];
                $error = $_FILES['upload']['error'][$i];
                $size = $_FILES['upload']['size'][$i];

                //lakukan pengecekan disini
                if ($size > $limit) {
                    $_SESSION['error'] = 'Ukuran gambar yang diupload melebihi yang diizinkan';
                    header('location: index.php');
                    exit();
                }

                if ($error > 0) {
                    $_SESSION['error'] = 'Upload gagal (' . $error . ')';
                    header('location: index.php');
                    exit();
                }


                //kalau pengecekan sudah selesai, langsung proses
                move_uploaded_file($tmp, 'upload/' . $namafile);
            }

      //  }
    }

    public function upload()
    {
        $file_name_spbu = $_FILES['fileToUpload']['name'];   //mengambil nama file
        dd($file_name_spbu);
    //$target_dir = base_url()."upload_file/"; // ini untuk udah servers
       $target_dir =$_SERVER['DOCUMENT_ROOT']."/reportbalnus/public/upload_file/";
//    dd($target_dir);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    }



}