<?php
class Form2 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('form2Model', 'form2');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data['page'] = "Informasi Khusus";
        $data['subpage'] = "Sifat Dasar";
        $data['table'] = "sifat_dasar";
        $data['sifatDasar'] = $this->form2->getSifatDasar();
        $data['riwayat'] = $this->form2->getRiwayat("sifat_dasar");
        $this->load->view('Form2/sifat-dasar', $data);
    }
    public function kepribadian()
    {
        $data['page'] = "Informasi Khusus";
        $data['subpage'] = "Kepribadian";
        $data['table'] = "kepribadian";
        $data['kepribadian'] = $this->form2->getKepribadian();
        $data['riwayat'] = $this->form2->getRiwayat("kepribadian");
        $this->load->view('Form2/kepribadian', $data);
    }
    public function kepintaran()
    {
        $data['page'] = "Informasi Khusus";
        $data['subpage'] = "Kepintaran";
        $data['table'] = "kepintaran";
        $data['kepintaran'] = $this->form2->getKepintaran();
        $data['riwayat'] = $this->form2->getRiwayat("kepintaran");
        $this->load->view('Form2/kepintaran', $data);
    }
    public function addSifatDasar()
    {
        $kode = $this->input->post('kode');
        $sifatDasar = $this->input->post('sifatDasar');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataSifatDasar = array('kode' => $kode, 'sifat_dasar' => $sifatDasar, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form2->addData($dataSifatDasar, "sifat_dasar");
        $table = 'sifat_dasar';
        $ket = "menambahkan data sifat dasar " . $sifatDasar;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form2->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menambahkan sifat dasar');
        redirect(base_url('form2'));
    }
    public function addKepribadian()
    {
        $kode = $this->input->post('kode');
        $kepribadian = $this->input->post('kepribadian');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataKepribadian = array('kode' => $kode, 'kepribadian' => $kepribadian, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form2->addData($dataKepribadian, "kepribadian");
        $table = 'kepribadian';
        $ket = "menambahkan data kepribadian " . $kepribadian;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form2->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menambahkan data kepribadian');
        redirect(base_url('form2/kepribadian'));
    }
    public function addKepintaran()
    {
        $kode = $this->input->post('kode');
        $kepintaran = $this->input->post('kepintaran');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataKepintaran = array('kode' => $kode, 'kepintaran' => $kepintaran, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form2->addData($dataKepintaran, "kepintaran");
        $table = 'kepintaran';
        $ket = "menambahkan data kepintaran " . $kepintaran;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form2->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menambahkan data kepintaran');
        redirect(base_url('form2/kepintaran'));
    }
    public function getSifatDasarById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form2->getDataById($id, "sifat_dasar");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function getKepribadianById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form2->getDataById($id, "kepribadian");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function getKepintaranById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form2->getDataById($id, "kepintaran");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function updateSifatDasar()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $sifatDasar = $this->input->post('sifatDasar');
        $old = $this->input->post('old');
        $updated_at = date('Y-m-d H:i:s');
        $dataSifatDasar = array('kode' => $kode, 'sifat_dasar' => $sifatDasar, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form2->editData($where, $dataSifatDasar, "sifat_dasar");

        if ($sifatDasar != $old) {
            $dataRiwayat = array("segmen" => "sifat_dasar", "date" => $updated_at, "keterangan" => "mengubah data sifat dasar " . $old . " menjadi " . $sifatDasar);
            $this->form2->addRiwayat($dataRiwayat);
        }


        $this->session->set_flashdata('pesan', 'Berhasil mengedit data sifat dasar');
        redirect(base_url('form2'));
    }
    public function updateKepribadian()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $kepribadian = $this->input->post('kepribadian');
        $old = $this->input->post('old');
        $updated_at = date('Y-m-d H:i:s');
        $dataKepribadian = array('kode' => $kode, 'kepribadian' => $kepribadian, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form2->editData($where, $dataKepribadian, "kepribadian");

        if ($kepribadian != $old) {
            $dataRiwayat = array("segmen" => "kepribadian", "date" => $updated_at, "keterangan" => "mengubah data kepribadian " . $old . " menjadi " . $kepribadian);
            $this->form2->addRiwayat($dataRiwayat);
        }

        $this->session->set_flashdata('pesan', 'Berhasil mengedit data kepribadian');
        redirect(base_url('form2/kepribadian'));
    }
    public function updateKepintaran()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $kepintaran = $this->input->post('kepintaran');
        $old = $this->input->post('old');
        $updated_at = date('Y-m-d H:i:s');
        $dataKepintaran = array('kode' => $kode, 'kepintaran' => $kepintaran, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form2->editData($where, $dataKepintaran, "kepintaran");

        if ($kepintaran != $old) {
            $dataRiwayat = array("segmen" => "kepintaran", "date" => $updated_at, "keterangan" => "mengubah data kepintaran " . $old . " menjadi " . $kepintaran);
            $this->form2->addRiwayat($dataRiwayat);
        }


        $this->session->set_flashdata('pesan', 'Berhasil mengedit data kepintaran');
        redirect(base_url('form2/kepintaran'));
    }
    public function deleteSifatDasar()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $where = array("id" => $id);
        $updated_at = date('Y-m-d H:i:s');
        $hasil = $this->form2->deleteData($where, "sifat_dasar");
        $dataRiwayat = array("segmen" => "sifat_dasar", "date" => $updated_at, "keterangan" => "menghapus data sifat dasar " . $name);
        $this->form2->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form2'));
    }
    public function deleteKepribadian()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $where = array("id" => $id);
        $updated_at = date('Y-m-d H:i:s');
        $hasil = $this->form2->deleteData($where, "kepribadian");
        $dataRiwayat = array("segmen" => "kepribadian", "date" => $updated_at, "keterangan" => "menghapus data kepribadian " . $name);
        $this->form2->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form2/kepribadian'));
    }
    public function deleteKepintaran()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $where = array("id" => $id);
        $updated_at = date('Y-m-d H:i:s');
        $hasil = $this->form2->deleteData($where, "kepintaran");
        $dataRiwayat = array("segmen" => "kepintaran", "date" => $updated_at, "keterangan" => "menghapus data kepintaran " . $name);
        $this->form2->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form2/kepintaran'));
    }
}
