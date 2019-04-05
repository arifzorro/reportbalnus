<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // run via cmd (command line) => php index.php [nama_function] [parameter]
        if (! is_cli()) {
            show_404();
        }

        $this->load->library('migration');

    }

    public function make($name) {
        $this->make_migration_file($name);
    }

    protected function make_migration_file($name) {
        $date = new DateTime();
        $timestamp = $date->format('YmdHis');
        $file_name = $timestamp . "_" . "$name.php";

        $path = APPPATH . "migrations/$file_name";

        $my_migration = fopen($path, "w") or die("Unable to create migration file!");

        $migration_template = "<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_$name extends CI_Migration {

    public function up() {
        
    }

    public function down() {
        
    }

}";

        fwrite($my_migration, $migration_template);

        fclose($my_migration);

        echo "$file_name has successfully been created." . PHP_EOL;
    }

    private function _show_migration_message()
    {
        echo "Error!" . $this->migration->error_string() . PHP_EOL;
    }

    public function run()
    {
        if (! $this->migration->latest()) {
            $this->_show_migration_message();
        }
    }

    public function reset()
    {
        if ($this->migration->version(0) === FALSE)
        {
            show_error($this->migration->error_string());
        }
    }

    public function refresh() {
        $this->reset();
        $this->run();
    }
}