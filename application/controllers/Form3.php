<?php
class Form3 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('form3Model', 'form3');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data['page'] = "Kategori Posisi";
        $data['subpage'] = "Penjualan";
        $data['table'] = "penjualan";
        $data['penjualan'] = $this->form3->getPenjualan();
        $data['riwayat'] = $this->form3->getRiwayat("penjualan");
        $this->load->view('Form3/penjualan', $data);
    }
    public function administrasi()
    {
        $data['page'] = "Kategori Posisi";
        $data['subpage'] = "Administrasi Umum";
        $data['table'] = "administrasi";
        $data['administrasi'] = $this->form3->getAdministrasi();
        $data['riwayat'] = $this->form3->getRiwayat("administrasi");
        $this->load->view('Form3/administrasi', $data);
    }
    public function addPenjualan()
    {
        $kode = $this->input->post('kode');
        $penjualan = $this->input->post('penjualan');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataPenjualan = array('kode' => $kode, 'penjualan' => $penjualan, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form3->addData($dataPenjualan, "penjualan");
        $table = 'penjualan';
        $ket = "menambahkan data penjualan " . $penjualan;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form3->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menambahkan penjualan');
        redirect(base_url('form3'));
    }
    public function addAdministrasi()
    {
        $kode = $this->input->post('kode');
        $administrasi = $this->input->post('administrasi');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataAdministrasi = array('kode' => $kode, 'administrasi' => $administrasi, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form3->addData($dataAdministrasi, "administrasi");
        $table = 'administrasi';
        $ket = "menambahkan data administrasi " . $administrasi;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form3->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menambahkan administrasi');
        redirect(base_url('form3/administrasi'));
    }
    public function getPenjualanById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form3->getDataById($id, "penjualan");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function getAdministrasiById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form3->getDataById($id, "administrasi");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function updatePenjualan()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $penjualan = $this->input->post('penjualan');
        $old = $this->input->post('old');
        $updated_at = date('Y-m-d H:i:s');
        $dataPenjualan = array('kode' => $kode, 'penjualan' => $penjualan, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form3->editData($where, $dataPenjualan, "penjualan");

        if ($penjualan != $old) {
            $dataRiwayat = array("segmen" => "penjualan", "date" => $updated_at, "keterangan" => "mengubah data penjualan " . $old . " menjadi " . $penjualan);
            $this->form3->addRiwayat($dataRiwayat);
        }

        $this->session->set_flashdata('pesan', 'Berhasil mengedit data penjualan');
        redirect(base_url('form3'));
    }
    public function updateAdministrasi()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $administrasi = $this->input->post('administrasi');
        $old = $this->input->post('old');
        $updated_at = date('Y-m-d H:i:s');
        $dataAdministrasi = array('kode' => $kode, 'administrasi' => $administrasi, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form3->editData($where, $dataAdministrasi, "administrasi");

        if ($administrasi != $old) {
            $dataRiwayat = array("segmen" => "administrasi", "date" => $updated_at, "keterangan" => "mengubah data administrasi " . $old . " menjadi " . $administrasi);
            $this->form3->addRiwayat($dataRiwayat);
        }

        $this->session->set_flashdata('pesan', 'Berhasil mengedit data administrasi');
        redirect(base_url('form3/administrasi'));
    }
    public function deletePenjualan()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $where = array("id" => $id);
        $updated_at = date('Y-m-d H:i:s');
        $hasil = $this->form3->deleteData($where, "penjualan");
        $dataRiwayat = array("segmen" => "penjualan", "date" => $updated_at, "keterangan" => "menghapus data penjualan " . $name);
        $this->form3->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form3'));
    }
    public function deleteAdministrasi()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $where = array("id" => $id);
        $updated_at = date('Y-m-d H:i:s');
        $hasil = $this->form3->deleteData($where, "administrasi");
        $dataRiwayat = array("segmen" => "administrasi", "date" => $updated_at, "keterangan" => "menghapus data administrasi " . $name);
        $this->form3->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form3/administrasi'));
    }
}
