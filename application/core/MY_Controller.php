<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

    protected $data = array();

    public function __construct() {
        parent::__construct();

        // filter semua page dari user yg belum login
        $this->auth->filter(array(ALL_ROLE),
            array('autentikasi/login'));

    }

    /**
     * 
     */
    private function load_layout($view = "", $view_data = [], $layout = "", $return = FALSE) {
        //var_dump($view);
        //var_dump($view_data);
        //var_dump($layout);

        // set view data
        $data = empty($view_data) ? $this->data : $view_data;
        // if not use master layout
        if (empty($layout)) {
            $this->load->view($view, $data, $return);

        } else {
            $content = $this->load->view($view, $data, TRUE);

            $section = $this->parse_section($content);

            $layout_data['js']      = is_null($section) ? NULL : $section['js'];

            $layout_data['css']     = is_null($section) ? NULL : $section['css'];

            $layout_data['content'] = is_null($section) ? $content : trim($section['content']);
            $this->load->view($layout, $layout_data, $return);
        }
    }

    /*
     * load master layout
     */
    protected function render($view = "", $view_data = "", $return = FALSE, $layout = "layouts/master") {
        $this->load_layout($view, $view_data, $layout, $return);
    }

    private function parse_section($html_content = "") {
        $this->load->helper('string');
        //var_dump($this->load->helper('string'));
        // wrapper
        $css_start = '<css>';  $css_end = '</css>';
        $js_start = '<js>';    $js_end = '</js>';

        $css = get_str_between($html_content, $css_start, $css_end);
        //var_dump($css);
        $js = get_str_between($html_content, $js_start, $js_end);

        // jika berisi section css atau js
        if (!empty($css) OR !empty($js)) {
            // ambil section css dan hapus di konten view
            if (!empty($css)) {
                $result['css']  = trim($css);
                $html_content   = str_replace($css_start . $css . $css_end, "", $html_content);
            } else { $result['css'] = NULL; }

            // ambil section js dan hapus di konten view
            if (!empty($js)) {
                $result['js'] = trim($js);
                $html_content = str_replace($js_start . $js . $js_end, "", $html_content);
            } else { $result['js'] = NULL; }

            $result['content'] = trim($html_content);
            return $result;
        }

        return NULL;
    }
}
