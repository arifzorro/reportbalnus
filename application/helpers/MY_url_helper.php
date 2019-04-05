<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * url to assets folder
 */
function assets($asset_name) {
    echo site_url($asset_name);
}

/**
 * url to route
 */
function route($route_name = "", $param = NULL) {
    echo is_null($param) ? base_url($route_name) : base_url($route_name) . "/$param";
}

function show_not_allowed() {
    redirect(base_url('maaf'), 'refresh');
}