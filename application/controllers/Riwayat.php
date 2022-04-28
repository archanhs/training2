<?php
class Riwayat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('riwayatModel', 'riwayat');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function showAll($table)
    {
        $data['page'] = "Riwayat";
        $data['subpage'] = "List Riwayat";
        $data['table'] = $table;
        $data['riwayat'] = $this->riwayat->getRiwayat($table);
        $this->load->view('Riwayat/show-all', $data);
    }
}
