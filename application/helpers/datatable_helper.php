<?php

//************************ Common Function *******************************/
function set_actions($id, $controller) {
    $ci =& get_instance();
    return $ci->load->view('commons/action_table_btn', array('id' => $id, 'controller' => $controller), TRUE);
}//************************ Common Function *******************************/
function set_actionslog($id, $controller) {
    $ci =& get_instance();
    return $ci->load->view('commons/action_table_btnlog', array('id' => $id, 'controller' => $controller), TRUE);
}
function set_actions_choose($id, $controller){
    $ci =& get_instance();
    return $ci->load->view('commons/action_table_btnspbu', array('id' => $id, 'controller' => $controller), TRUE);
////    echo "sampooo";
//   $this->uri->segment(2);
//  if( $this->uri->segment(2) s== "report_spbu" ){
//      return $ci->load->view('commons/action_table_btnlog', array('id' => $id, 'controller' => $controller), TRUE);
//  }

//  else{
//      return $ci->load->view('commons/action_table_btnlog', array('id' => $id, 'controller' => $controller), TRUE);
//  }
}

function show_status($status) {
    return $status == 1 ? 'Aktif' : 'Tidak Aktif';
}
