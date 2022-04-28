<?php
class Form1 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('form1Model', 'form1');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data['page'] = "Informasi Umum";
        $data['subpage'] = "Jenis Kelamin";
        $data['jenisKelamin'] = $this->form1->getJk();
        $data['riwayat'] = $this->form1->getRiwayat("jenis_kelamin");
        $data['table'] = "jenis_kelamin";
        $this->load->view('Form1/jenis-kelamin', $data);
    }
    public function agama()
    {
        $data['page'] = "Informasi Umum";
        $data['subpage'] = "Agama";
        $data['table'] = "agama";
        $data['agama'] = $this->form1->getAgama();
        $data['riwayat'] = $this->form1->getRiwayat("agama");
        $this->load->view('Form1/agama', $data);
    }
    public function status()
    {
        $data['page'] = "Informasi Umum";
        $data['subpage'] = "Status";
        $data['table'] = "status";
        $data['status'] = $this->form1->getStatus();
        $data['riwayat'] = $this->form1->getRiwayat("status");
        $this->load->view('Form1/status', $data);
    }
    public function golDarah()
    {
        $data['page'] = "Informasi Umum";
        $data['subpage'] = "Gol Darah";
        $data['table'] = "gol_darah";
        $data['golDarah'] = $this->form1->getGolDarah();
        $data['riwayat'] = $this->form1->getRiwayat("gol_darah");
        $this->load->view('Form1/goldarah', $data);
    }
    public function addJenisKelamin()
    {
        $kode = $this->input->post('kode');
        $jk = $this->input->post('jk');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataJk = array('kode' => $kode, 'jenis_kelamin' => $jk, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form1->addData($dataJk, "jenis_kelamin");
        $table = 'jenis_kelamin';
        $ket = "menambahkan data jenis kelamin " . $jk;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form1->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data Jenis Kelamin');
        redirect(base_url(''));
    }
    public function addAgama()
    {
        $kode = $this->input->post('kode');
        $agama = $this->input->post('agama');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataAgama = array('kode' => $kode, 'agama' => $agama, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form1->addData($dataAgama, "Agama");
        $table = 'agama';
        $ket = "menambahkan data agama " . $agama;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form1->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data Agama');
        redirect(base_url('form1/agama'));
    }
    public function addStatus()
    {
        $kode = $this->input->post('kode');
        $status = $this->input->post('status');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataAgama = array('kode' => $kode, 'status' => $status, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form1->addData($dataAgama, "status");
        $table = 'status';
        $ket = "menambahkan data status " . $status;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form1->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data Status');
        redirect(base_url('form1/status'));
    }
    public function addGolDarah()
    {
        $kode = $this->input->post('kode');
        $golDarah = $this->input->post('golDarah');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataGolDarah = array('kode' => $kode, 'gol_darah' => $golDarah, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form1->addData($dataGolDarah, "gol_darah");
        $table = 'gol_darah';
        $ket = "menambahkan data gol darah " . $golDarah;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form1->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data Gol Darah');
        redirect(base_url('form1/goldarah'));
    }
    public function getJenisKelaminById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form1->getDataById($id, "jenis_kelamin");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function getAgamaById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form1->getDataById($id, "agama");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function getStatusById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form1->getDataById($id, "status");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function getGolDarahById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form1->getDataById($id, "gol_darah");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function updateJk()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $jk = $this->input->post('jk');
        $old = $this->input->post('old');
        $updated_at = date('Y-m-d H:i:s');
        $dataJk = array('kode' => $kode, 'jenis_kelamin' => $jk, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form1->editData($where, $dataJk, "jenis_kelamin");


        if ($jk != $old) {
            $dataRiwayat = array("segmen" => "jenis_kelamin", "date" => $updated_at, "keterangan" => "mengubah data jenis kelamin " . $old . " menjadi " . $jk);
            $this->form1->addRiwayat($dataRiwayat);
        }

        $this->session->set_flashdata('pesan', 'Berhasil mengedit data jenis kelamin');
        redirect(base_url(''));
    }
    public function updateAgama()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $agama = $this->input->post('agama');
        $old = $this->input->post('old');
        $updated_at = date('Y-m-d H:i:s');
        $dataAgama = array('kode' => $kode, 'agama' => $agama, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form1->editData($where, $dataAgama, "agama");

        if ($agama != $old) {
            $dataRiwayat = array("segmen" => "agama", "date" => $updated_at, "keterangan" => "mengubah data agama " . $old . " menjadi " . $agama);
            $this->form1->addRiwayat($dataRiwayat);
        }

        $this->session->set_flashdata('pesan', 'Berhasil mengedit data agama');
        redirect(base_url('form1/agama'));
    }
    public function updateStatus()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $status = $this->input->post('status');
        $old = $this->input->post('old');
        $updated_at = date('Y-m-d H:i:s');
        $data = array('kode' => $kode, 'status' => $status, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form1->editData($where, $data, "status");

        if ($status != $old) {
            $dataRiwayat = array("segmen" => "status", "date" => $updated_at, "keterangan" => "mengubah data status " . $old . " menjadi " . $status);
            $this->form1->addRiwayat($dataRiwayat);
        }

        $this->session->set_flashdata('pesan', 'Berhasil mengedit data status');
        redirect(base_url('form1/status'));
    }
    public function updateGolDarah()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $golDarah = $this->input->post('golDarah');
        $old = $this->input->post('old');
        $updated_at = date('Y-m-d H:i:s');
        $data = array('kode' => $kode, 'gol_darah' => $golDarah, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form1->editData($where, $data, "gol_darah");

        if ($golDarah != $old) {
            $dataRiwayat = array("segmen" => "gol_darah", "date" => $updated_at, "keterangan" => "mengubah data gol darah " . $old . " menjadi " . $golDarah);
            $this->form1->addRiwayat($dataRiwayat);
        }

        $this->session->set_flashdata('pesan', 'Berhasil mengedit data gol darah');
        redirect(base_url('form1/goldarah'));
    }
    public function deleteJk()
    {
        $id = $this->input->post('id');
        $where = array("id" => $id);
        $name = $this->input->post('name');
        $updated_at = date('Y-m-d H:i:s');
        $hasil = $this->form1->deleteData($where, "jenis_kelamin");
        $dataRiwayat = array("segmen" => "jenis_kelamin", "date" => $updated_at, "keterangan" => "menghapus data jenis kelamin " . $name);
        $this->form1->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url(''));
    }
    public function deleteAgama()
    {
        $id = $this->input->post('id');
        $where = array("id" => $id);
        $name = $this->input->post('name');
        $updated_at = date('Y-m-d H:i:s');
        $hasil = $this->form1->deleteData($where, "agama");
        $dataRiwayat = array("segmen" => "agama", "date" => $updated_at, "keterangan" => "menghapus data agama " . $name);
        $this->form1->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form1/agama'));
    }
    public function deleteStatus()
    {
        $id = $this->input->post('id');
        $where = array("id" => $id);
        $name = $this->input->post('name');
        $updated_at = date('Y-m-d H:i:s');
        $this->form1->deleteData($where, "status");
        $dataRiwayat = array("segmen" => "status", "date" => $updated_at, "keterangan" => "menghapus data status " . $name);
        $this->form1->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form1/status'));
    }
    public function deleteGolDarah()
    {
        $id = $this->input->post('id');
        $where = array("id" => $id);
        $name = $this->input->post('name');
        $updated_at = date('Y-m-d H:i:s');
        $this->form1->deleteData($where, "gol_darah");
        $dataRiwayat = array("segmen" => "gol_darah", "date" => $updated_at, "keterangan" => "menghapus data gol darah " . $name);
        $this->form1->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form1/goldarah'));
    }
}
