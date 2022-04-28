<?php
class Form4 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('form4Model', 'form4');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data['page'] = "Format Dasar Payroll";
        $data['subpage'] = "Gaji Pokok";
        $data['table'] = "gaji_pokok";
        $data['gajipokok'] = $this->form4->getGajiPokok();
        $data['riwayat'] = $this->form4->getRiwayat("gaji_pokok");
        $this->load->view('Form4/gaji-pokok', $data);
    }
    public function golongan()
    {
        $data['page'] = "Format Dasar Payroll";
        $data['subpage'] = "Golongan";
        $data['table'] = "golongan";
        $data['golongan'] = $this->form4->getGolongan();
        $data['sub_golongan'] = $this->form4->getSubGolongan();
        $data['riwayat'] = $this->form4->getRiwayat("golongan");
        $this->load->view('Form4/golongan', $data);
    }
    public function addGajiPokok()
    {
        $kode = $this->input->post('kode');
        $kota = $this->input->post('kota');
        $gajiPokok = $this->input->post('gajiPokok');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataGajiPokok = array('kode' => $kode, 'gaji_pokok' => $gajiPokok, 'kota' => $kota, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form4->addData($dataGajiPokok, "gaji_pokok");
        $table = 'gaji_pokok';
        $ket = "menambahkan data gaji pokok " . $kota;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form4->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menambahkan gaji pokok');
        redirect(base_url('form4'));
    }
    public function addGolongan()
    {
        $kode = $this->input->post('kode');
        $golongan = $this->input->post('golongan');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataGajiPokok = array('kode' => $kode, 'golongan' => $golongan, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form4->addData($dataGajiPokok, "golongan");
        $table = 'golongan';
        $ket = "menambahkan data " . $golongan;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form4->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menambahkan golongan');
        redirect(base_url('form4/golongan'));
    }
    public function addSubGolongan()
    {
        $kode = $this->input->post('kode');
        $golongan = $this->input->post('golongan');
        $dataGolongan = $this->form4->getGolonganById($golongan);
        $subGolongan = $this->input->post('subGolongan');
        $nominal = $this->input->post('nominal');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $dataGajiPokok = array('kode' => $kode, 'golongan' => $golongan, 'sub_golongan' => $subGolongan, 'nominal' => $nominal, 'created_at' => $created_at, 'updated_at' => $updated_at);
        $this->form4->addData($dataGajiPokok, "sub_golongan");
        $table = 'golongan';
        $ket = "menambahkan data sub golongan " . $subGolongan . " pada " . $dataGolongan->golongan;
        $dataRiwayat = array("segmen" => $table, "date" => $created_at, "keterangan" => $ket);
        $this->form4->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menambahkan sub golongan');
        redirect(base_url('form4/golongan'));
    }
    public function getGolonganById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form4->getDataById($id, "golongan");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function getGajiPokokById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form4->getDataById($id, "gaji_pokok");
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function getSubGolonganById()
    {
        $id = $this->input->post('id');
        $hasil = $this->form4->getSubGolonganById($id);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($hasil));
    }
    public function updateGajiPokok()
    {
        $update = 1;
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $kota = $this->input->post('kota');
        $gajiPokok = $this->input->post('gajiPokok');
        $oldKota = $this->input->post('oldKota');
        $oldGaji = $this->input->post('oldGaji');
        if ($kota != $oldKota) {
            $keterangan = "mengubah data nama kota " . $oldKota . " menjadi " . $kota;
        } else if ($gajiPokok != $oldGaji) {
            $keterangan = "mengubah data gaji pokok pada kota " . $oldKota . " dari " . $oldGaji . " ke " . $gajiPokok;
        } else if ($kota != $oldKota && $gajiPokok != $oldGaji) {
            $keterangan = "mengubah data gaji pokok pada kota" . $oldKota . " menjadi " . $kota . " dan dari " . $oldGaji . " ke " . $gajiPokok;
        } else {
            $update = 0;
        }
        $updated_at = date('Y-m-d H:i:s');
        $dataGajiPokok = array('kode' => $kode, 'gaji_pokok' => $gajiPokok, 'kota' => $kota, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form4->editData($where, $dataGajiPokok, "gaji_pokok");

        if ($update == 1) {
            $dataRiwayat = array("segmen" => "gaji_pokok", "date" => $updated_at, "keterangan" => $keterangan);
            $this->form4->addRiwayat($dataRiwayat);
        }

        $this->session->set_flashdata('pesan', 'Berhasil mengedit data gaji pokok');
        redirect(base_url('form4'));
    }
    public function updateGolongan()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $golongan = $this->input->post('golongan');
        $old = $this->input->post('old');
        $oldKode = $this->input->post('oldKode');
        $updated_at = date('Y-m-d H:i:s');
        $dataGolongan = array('kode' => $kode, 'golongan' => $golongan, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form4->editData($where, $dataGolongan, "golongan");

        if ($golongan != $old || $kode != $oldKode) {
            $dataRiwayat = array("segmen" => "golongan", "date" => $updated_at, "keterangan" => "mengubah data " . $old);
            $this->form4->addRiwayat($dataRiwayat);
        }

        $this->session->set_flashdata('pesan', 'Berhasil mengedit data golongan');
        redirect(base_url('form4/golongan'));
    }
    public function updateSubGolongan()
    {
        $update = 1;
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $subGolongan = $this->input->post('subGolongan');
        $golongan = $this->input->post('golongan');
        $nominal = $this->input->post('nominal');
        $oldSubGolongan = $this->input->post('old');
        $oldNominal = $this->input->post('oldNominal');
        if ($subGolongan != $oldSubGolongan) {
            $keterangan = "mengubah data sub golongan " . $oldSubGolongan . " pada golongan " . $golongan;
        } else if ($nominal != $oldNominal) {
            $keterangan = "mengubah data sub golongan " . $oldSubGolongan . " pada golongan " . $golongan;
        } else {
            $update = 0;
        }
        $updated_at = date('Y-m-d H:i:s');
        $dataSubGolongan = array('kode' => $kode, 'sub_golongan' => $subGolongan, 'nominal' => $nominal, 'updated_at' => $updated_at);
        $where = array('id' => $id);
        $this->form4->editData($where, $dataSubGolongan, "sub_golongan");

        if ($update == 1) {
            $dataRiwayat = array("segmen" => "golongan", "date" => $updated_at, "keterangan" => $keterangan);
            $this->form4->addRiwayat($dataRiwayat);
        }

        $this->session->set_flashdata('pesan', 'Berhasil mengedit data sub golongan');
        redirect(base_url('form4/golongan'));
    }
    public function deleteGajiPokok()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $where = array("id" => $id);
        $updated_at = date('Y-m-d H:i:s');
        $hasil = $this->form4->deleteData($where, "gaji_pokok");
        $dataRiwayat = array("segmen" => "gaji_pokok", "date" => $updated_at, "keterangan" => "menghapus data gaji pokok di kota " . $name);
        $this->form4->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form4'));
    }
    public function deleteGolongan()
    {
        $id = $this->input->post('id');
        $dataGolongan = $this->form4->getGolonganById($id);
        $where = array("id" => $id);
        $updated_at = date('Y-m-d H:i:s');
        $hasil = $this->form4->deleteData($where, "golongan");
        $dataRiwayat = array("segmen" => "golongan", "date" => $updated_at, "keterangan" => "menghapus data " . $dataGolongan->golongan);
        $this->form4->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form4/golongan'));
    }
    public function deleteSubGolongan()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $dataGolongan = $this->form4->getGolonganById($id);
        $where = array("id" => $id);
        $updated_at = date('Y-m-d H:i:s');
        $hasil = $this->form4->deleteData($where, "sub_golongan");
        $dataRiwayat = array("segmen" => "golongan", "date" => $updated_at, "keterangan" => "menghapus data sub golongan " . $name . " pada golongan " . $dataGolongan->golongan);
        $this->form4->addRiwayat($dataRiwayat);
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('form4/golongan'));
    }
}
