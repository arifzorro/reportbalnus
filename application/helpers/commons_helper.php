<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('enable_profiler')) {
    function enable_profiler()
    {
        $ci =& get_instance();
        $ci->output->enable_profiler(TRUE);
    }
}

if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}

function starts_with($haystack, $needle) {
    return ((FALSE !== strpos($haystack,$needle)) &&
        (0 == strpos($haystack,$needle)));
}

if (! function_exists('mix')) {
    /**
     * Get the path to a versioned Mix file.
     *
     * @param string $path
     * @param string $manifestDirectory
     * @return string
     *
     * @throws \Exception
     */
    function mix($path, $manifestDirectory = '') {
        static $manifest;
        $publicFolder = '';
        $rootPath = $_SERVER['DOCUMENT_ROOT'];
        $publicPath = $rootPath . $publicFolder;
        if ($manifestDirectory && ! starts_with($manifestDirectory, '/')) {
            $manifestDirectory = "/{$manifestDirectory}";
        }
        if (! $manifest) {
            //dd($rootPath . $manifestDirectory.'/ganti-meter/public/mix-manifest.json');
//            if (! file_exists($manifestPath = ($rootPath . $manifestDirectory.'/mix-manifest.json') )) {
//                throw new Exception('The Mix manifest does not exist.');
//            }
            //ini sy tambahkan sendiri aslinya diatas
            if (! file_exists($manifestPath = ($rootPath . $manifestDirectory.'/bank_soal/public/mix-manifest.json') )) {
                throw new Exception('The Mix manifest does not exist.');
            }

            $manifest = json_decode(file_get_contents($manifestPath), true);
        }
//        dump($manifest);
        if (! starts_with($path, '/')) {
            $path = "/{$path}";
        }
        $path = $publicFolder . $path;
        if (! array_key_exists($path, $manifest)) {
            throw new Exception(
                "Unable to locate Mix file: {$path}. Please check your ".
                'webpack.mix.js output paths and try again.'
            );
        }
        echo file_exists($publicPath . ($manifestDirectory.'/hot'))
            ? "http://meteran.localhost/{$manifest[$path]}"
            : site_url($manifestDirectory.$manifest[$path]);
    }
}


if (!function_exists('dd')) {
    function dd($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

function empty_or_null(&$var, $non_zero = FALSE) {
    if (isset($var)) {
        if (is_string($var)) {
            $var = trim($var);
        }
        if ($non_zero) {
            return (is_null($var) OR empty($var) OR ($var == 0));
        }
        return (is_null($var) OR empty($var));
    } return TRUE;
}

function printv(&$var, $default = NULL) {
    echo !empty_or_null($var) ? $var : (is_null($default) ? "" : $default);
}

function show_ifset(&$var, $default = NULL, $is_date = FALSE) {
    //var_dump($var);
    echo !empty_or_null($var) ? ($is_date ? show_date($var) : $var) : (is_null($default) ? "":$default);
}
function show_ifsetoption(&$var, $default = NULL, $is_date = FALSE) {
    //var_dump($var);
    echo !empty_or_null($var) ? ($is_date ? show_date($var) : $var) : (is_null($default) ? "PILIH":$default);
}
/*
 * mengubah param menjadi array
 */
function cast_to_array($param) {
    return is_array($param) ?
        $param : array($param);
}

//function get_time() {
//    return date('Y-m-d H:i:s', time());
//} asli

function get_time() {
    date_default_timezone_set('Etc/GMT-8');
    $date = date('d-m-Y h:i:s', time());
    return $date;
}

function user_timestamps($is_add_state) {
    $ci =& get_instance();
    if ($is_add_state) {
        return array(
            'insert_by'  => $ci->auth->get_user_id(),
            'created_at' => get_time()
        );
    } else {
        return array('updated_at'  => get_time());
    }
}

/*
 * set flash message ke session sbagai notifikasi
 * $type = success, error, info (default: success)
 */
function set_flash_message($message, $type = "success") {
    $ci =& get_instance();
    $ci->session->set_flashdata(array(
        'message'   => $message,
        'type'      => $type));
}

function set_date($date) {
    if (empty_or_null($date)) return '';
    $date = DateTime::createFromFormat('d-m-Y', $date);
    return date_format($date, 'Y-m-d');
}

function set_date_changeformat($date) {
    if (empty_or_null($date)) return '';
    $date = DateTime::createFromFormat('d-m-Y', $date);
    return date_format($date, 'Y-m-d');
}
function set_date_changeformat_with_time($date) {
    if (empty_or_null($date)) return '';
    $date = DateTime::createFromFormat('d-m-Y H:i:s', $date);
    return date_format($date, 'Y-m-d H:i:s');
}
function set_date_changeformat_with_no_time($date) {
    if (empty_or_null($date)) return '';
    $date = DateTime::createFromFormat('d-m-Y H:i:s', $date);
    return date_format($date, 'Y-m-d');
}
function set_date_changeformat_indo_to_us($date) {
    if (empty_or_null($date)) return '';
    $date = DateTime::createFromFormat('d-m-Y', $date);
    return date_format($date, 'Y-m-d');
}

function show_date($date) {
    $date = DateTime::createFromFormat('Y-m-d', $date);
    return date_format($date, 'd-m-Y');
}
function show_date_change_format($date) {
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
    //json_encode($date);
    return date_format($date, 'd-m-Y H:i:s');
}

function get_str_between($str, $start, $end) {
    $pos_start = strpos($str, $start);
    if ($pos_start !== FALSE) {
        $pos_end = strpos($str, $end);
        $length = $pos_end - $pos_start + 1;
        return substr($str, $pos_start  + strlen($start), $length - strlen($end));
    }
    return NULL;
}