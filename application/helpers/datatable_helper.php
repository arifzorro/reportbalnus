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

function show_status($status) {
    return $status == 1 ? 'Aktif' : 'Tidak Aktif';
}
