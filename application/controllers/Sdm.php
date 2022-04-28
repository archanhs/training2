<?php

use Dompdf\Dompdf;
use Dompdf\Options;

class Sdm extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('sdmModel', 'formSdm');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function formSdm()
    {
        $data['page'] = "Input Sdm Tahap 1";
        $data['subpage'] = "Form Input Sdm Tahap 1";
        $data['jk'] = $this->formSdm->getJk();
        $data['agama'] = $this->formSdm->getAgama();
        $data['status'] = $this->formSdm->getStatus();
        $data['golDarah'] = $this->formSdm->getGolDarah();
        $this->load->view('Sdm/input-sdm-tahap-1', $data);
    }
    public function listSdm()
    {
        $data['page'] = "List Sdm";
        $data['subPage'] = "List Sdm";
        $data['sdm'] = $this->formSdm->getSdm();
        $this->load->view('Sdm/list-sdm', $data);
    }
    public function addsdm()
    {
        $config['upload_path']          = './upload';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 20000;
        $config['max_width']            = 10000;
        $config['max_height']           = 7000;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_ktp')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        } else {
            $data =  $this->upload->data();
            $fileKtp = $data['file_name'];
        }
        if (!$this->upload->do_upload('foto_diri')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        } else {
            $data =  $this->upload->data();
            $fileDiri = $data['file_name'];
        }
        if (!$this->upload->do_upload('foto_kk')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        } else {
            $data =  $this->upload->data();
            $fileKk = $data['file_name'];
        }

        $nama = $this->input->post('nama');
        $panggilan = $this->input->post('panggilan');
        $jk = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $telp = $this->input->post('telp');
        $nik = $this->input->post('nik');
        $agama = $this->input->post('agama');
        $status = $this->input->post('status');
        $gol_darah = $this->input->post('gol_darah');
        $tinggi = $this->input->post('tinggi');
        $berat = $this->input->post('berat');
        $baju = $this->input->post('baju');
        $penyakit = $this->input->post('penyakit');
        $ig = $this->input->post('ig');
        $fb = $this->input->post('fb');
        $tw = $this->input->post('tw');
        $pendidikan = $this->input->post('pendidikan');
        $tujuan = $this->input->post('tujuan');
        $pernah_bekerja = $this->input->post('pernah_bekerja');
        $date_pemanggilan = $this->input->post('date_pemanggilan');
        $daftar_bagian = $this->input->post('daftar_bagian');
        $aktivitas_diluar = $this->input->post('aktivitas_diluar');
        $no_kerabat = $this->input->post('no_kerabat');
        $alamat_ortu = $this->input->post('alamat_ortu');
        $provinsi_ortu = $this->input->post('provinsi_ortu');
        $kabupaten_ortu = $this->input->post('kabupaten_ortu');
        $status_ortu = $this->input->post('status_ortu');
        $penghasilan_ortu = $this->input->post('penghasilan_ortu');
        $tanggungan_ortu = $this->input->post('tanggungan_ortu');
        $nama_ayah = $this->input->post('nama_ayah');
        $status_ayah = $this->input->post('status_ayah');
        $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
        $nama_ibu = $this->input->post('nama_ibu');
        $status_ibu = $this->input->post('status_ibu');
        $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
        $pekerjaan_saudara1 = $this->input->post('pekerjaan_saudara1');
        $pekerjaan_saudara2 = $this->input->post('pekerjaan_saudara2');
        $pekerjaan_saudara3 = $this->input->post('pekerjaan_saudara3');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $data = array(
            'nama' => $nama,
            'panggilan' => $panggilan,
            'jenis_kelamin' => $jk,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'no_telp' => $telp,
            'nik' => $nik,
            'agama' => $agama,
            'status' => $status,
            'gol_darah' => $gol_darah,
            'tinggi_badan' => $tinggi,
            'berat_badan' => $berat,
            'ukuran_baju' => $baju,
            'riwayat_penyakit' => $penyakit,
            'instagram' => $ig,
            'facebook' => $fb,
            'twitter' => $tw,
            'pendidikan_terakhir' => $pendidikan,
            'tujuan_bekerja' => $tujuan,
            'pernah_bekerja' => $pernah_bekerja,
            'tanggal_pemanggilan' => $date_pemanggilan,
            'aktivitas_lain' => $aktivitas_diluar,
            'daftar_bagian' => $daftar_bagian,
            'no_kerabat' => $no_kerabat,
            'alamat_ortu' => $alamat_ortu,
            'provinsi_ortu' => $provinsi_ortu,
            'kabupaten_ortu' => $kabupaten_ortu,
            'status_ortu' => $status_ortu,
            'penghasilan_ortu' => $penghasilan_ortu,
            'tanggungan_ortu' => $tanggungan_ortu,
            'nama_ayah' => $nama_ayah,
            'status_ayah' => $status_ayah,
            'pekerjaan_ayah' => $pekerjaan_ayah,
            'nama_ibu' => $nama_ibu,
            'status_ibu' => $status_ibu,
            'pekerjaan_ibu' => $pekerjaan_ibu,
            'pekerjaan_saudara_1' => $pekerjaan_saudara1,
            'pekerjaan_saudara_2' => $pekerjaan_saudara2,
            'pekerjaan_saudara_3' => $pekerjaan_saudara3,
            'status_sdm' => 0,
            'file_foto' => $fileDiri,
            'file_ktp' => $fileKtp,
            'file_kk' => $fileKk,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        );
        $this->formSdm->addSdm($data, "sdm");
        $this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data SDM Tahap 1');
        redirect(base_url('sdm/listsdm'));
    }
    public function updatesdm()
    {
        $config['upload_path']          = './upload';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 20000;
        $config['max_width']            = 10000;
        $config['max_height']           = 7000;
        $config['encrypt_name']         = TRUE;

        $ktp = false;
        $kk = false;
        $diri = false;

        $this->load->library('upload', $config);
        if ($_FILES['foto_ktp']["name"] != "") {
            if (!$this->upload->do_upload('foto_ktp')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            } else {
                unlink('./upload/' . $this->input->post('old_ktp'));
                $data =  $this->upload->data();
                $fileKtp = $data['file_name'];
                $ktp = true;
            }
        }
        if ($_FILES['foto_diri']["name"] != "") {
            if (!$this->upload->do_upload('foto_diri')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            } else {
                unlink('./upload/' . $this->input->post('old_diri'));
                $data =  $this->upload->data();
                $fileDiri = $data['file_name'];
                $diri = true;
            }
        }
        if ($_FILES['foto_kk']["name"] != "") {
            if (!$this->upload->do_upload('foto_kk')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            } else {
                unlink('./upload/' . $this->input->post('old_kk'));
                $data =  $this->upload->data();
                $fileKk = $data['file_name'];
                $kk = true;
            }
        }


        $nama = $this->input->post('nama');
        $panggilan = $this->input->post('panggilan');
        $jk = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $telp = $this->input->post('telp');
        $nik = $this->input->post('nik');
        $agama = $this->input->post('agama');
        $status = $this->input->post('status');
        $gol_darah = $this->input->post('gol_darah');
        $tinggi = $this->input->post('tinggi');
        $berat = $this->input->post('berat');
        $baju = $this->input->post('baju');
        $penyakit = $this->input->post('penyakit');
        $ig = $this->input->post('ig');
        $fb = $this->input->post('fb');
        $tw = $this->input->post('tw');
        $pendidikan = $this->input->post('pendidikan');
        $tujuan = $this->input->post('tujuan');
        $pernah_bekerja = $this->input->post('pernah_bekerja');
        $date_pemanggilan = $this->input->post('date_pemanggilan');
        $daftar_bagian = $this->input->post('daftar_bagian');
        $aktivitas_diluar = $this->input->post('aktivitas_diluar');
        $no_kerabat = $this->input->post('no_kerabat');
        $alamat_ortu = $this->input->post('alamat_ortu');
        $provinsi_ortu = $this->input->post('provinsi_ortu');
        $kabupaten_ortu = $this->input->post('kabupaten_ortu');
        $status_ortu = $this->input->post('status_ortu');
        $penghasilan_ortu = $this->input->post('penghasilan_ortu');
        $tanggungan_ortu = $this->input->post('tanggungan_ortu');
        $nama_ayah = $this->input->post('nama_ayah');
        $status_ayah = $this->input->post('status_ayah');
        $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
        $nama_ibu = $this->input->post('nama_ibu');
        $status_ibu = $this->input->post('status_ibu');
        $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
        $pekerjaan_saudara1 = $this->input->post('pekerjaan_saudara1');
        $pekerjaan_saudara2 = $this->input->post('pekerjaan_saudara2');
        $pekerjaan_saudara3 = $this->input->post('pekerjaan_saudara3');
        $updated_at = date('Y-m-d H:i:s');
        $data = array(
            'nama' => $nama,
            'panggilan' => $panggilan,
            'jenis_kelamin' => $jk,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'no_telp' => $telp,
            'nik' => $nik,
            'agama' => $agama,
            'status' => $status,
            'gol_darah' => $gol_darah,
            'tinggi_badan' => $tinggi,
            'berat_badan' => $berat,
            'ukuran_baju' => $baju,
            'riwayat_penyakit' => $penyakit,
            'instagram' => $ig,
            'facebook' => $fb,
            'twitter' => $tw,
            'pendidikan_terakhir' => $pendidikan,
            'tujuan_bekerja' => $tujuan,
            'pernah_bekerja' => $pernah_bekerja,
            'tanggal_pemanggilan' => $date_pemanggilan,
            'aktivitas_lain' => $aktivitas_diluar,
            'daftar_bagian' => $daftar_bagian,
            'no_kerabat' => $no_kerabat,
            'alamat_ortu' => $alamat_ortu,
            'provinsi_ortu' => $provinsi_ortu,
            'kabupaten_ortu' => $kabupaten_ortu,
            'status_ortu' => $status_ortu,
            'penghasilan_ortu' => $penghasilan_ortu,
            'tanggungan_ortu' => $tanggungan_ortu,
            'nama_ayah' => $nama_ayah,
            'status_ayah' => $status_ayah,
            'pekerjaan_ayah' => $pekerjaan_ayah,
            'nama_ibu' => $nama_ibu,
            'status_ibu' => $status_ibu,
            'pekerjaan_ibu' => $pekerjaan_ibu,
            'pekerjaan_saudara_1' => $pekerjaan_saudara1,
            'pekerjaan_saudara_2' => $pekerjaan_saudara2,
            'pekerjaan_saudara_3' => $pekerjaan_saudara3,
            'status_sdm' => 0,
            'updated_at' => $updated_at
        );
        if ($diri) {
            $data['file_foto'] = $fileDiri;
        }
        if ($ktp) {
            $data['file_ktp'] = $fileKtp;
        }
        if ($kk) {
            $data['file_kk'] = $fileKk;
        }
        $where = array("id" => $this->input->post('id'));
        $this->formSdm->updateSdm($where, $data, "sdm");
        $this->session->set_flashdata('pesan', 'Berhasil Update Data SDM');
        redirect(base_url('sdm/listsdm'));
    }
    public function ttdKontrak($id)
    {
        $data['sdm'] = $this->formSdm->getSdmById($id);
        $data['date'] = date('Y-m-d');
        $this->load->view('Sdm/ttd-kontrak', $data);
        // // instantiate and use the dompdf class
        // $dompdf = new Dompdf();
        // $dompdf->loadHtml('hello world');

        // // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');

        // // Render the HTML as PDF
        // $dompdf->render();

        // // Output the generated PDF to Browser
        // return $dompdf->stream("", array("Attachment" => false));
    }
    public function redirectlist()
    {
        $this->session->set_flashdata('pesan', 'Berhasil Tanda Tangan Kontrak');
        redirect(base_url('sdm/listSdm'));
    }
    public function addKontrak()
    {
        error_reporting(0);
        $data_uri = $this->input->post('signature1');
        $encoded_image = explode(",", $data_uri)[1];
        $decoded_image = base64_decode($encoded_image);
        //$signatur1 = $encoded_image;
        $signatur1 = random_string('sha1') . ".png";
        file_put_contents("upload/" . $signatur1, $decoded_image);

        $data_uri = $this->input->post('signature2');
        $encoded_image = explode(",", $data_uri)[1];
        $decoded_image = base64_decode($encoded_image);
        //$signatur2 = $encoded_image;
        $signatur2 = random_string('sha1') . ".png";
        file_put_contents("upload/" . $signatur2, $decoded_image);

        $dateStart = date('Y-m-d');
        $dateEx = $this->input->post('dateEx');
        $idSdm = $this->input->post('sdm');
        $lama = $this->input->post('lama');

        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        $data = array("sdm" => $idSdm, "mulai" => $dateStart, "selesai" => $dateEx, "created_at" => $created_at, "updated_at" => $updated_at, "signature_1" => $signatur1, "signature_2" => $signatur2, "lama_kontrak" => $lama, 'pdf' => "");

        $this->formSdm->addKontrak($data, "kontrak");
        //make pdf html
        $data['sdm'] = $this->formSdm->getSdmById($idSdm);
        $data['kontrak'] = $this->formSdm->getKontrakBySdm($idSdm);
        $data['date'] = date('Y-m-d');
        // $this->load->view('Sdm/kontrak', $data);
        $html = $this->load->view('Sdm/kontrak', $data, true);
        //update kontrak add pdf html
        $where = array("sdm" => $idSdm);
        $update = array("pdf" => $html);
        $this->formSdm->updateSdm($where, $update, "kontrak");

        $where = array("id" => $idSdm);
        $update = array("status_sdm" => 1);
        $this->formSdm->updateSdm($where, $update, "sdm");
    }
    public function getKontrak($id)
    {
        $html = $this->formSdm->getPdfBySdm($id)->pdf;

        $dompdf = new Dompdf();
        $options = new Options();
        $options->setIsRemoteEnabled(true);

        $dompdf->setOptions($options);
        $dompdf->output();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->output(['isRemoteEnabled' => true]);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("cek.pdf", array("Attachment" => false));
    }
    public function deleteSdm()
    {
        error_reporting(0);
        $id = $this->input->post('id');
        $kontrak = $this->formSdm->getPdfBySdm($id);
        $sdm = $this->formSdm->getSdmById($id);
        unlink('./upload/' . $kontrak->signature_1);
        unlink('./upload/' . $kontrak->signature_2);
        unlink('./upload/' . $sdm->file_foto);
        unlink('./upload/' . $sdm->file_ktp);
        unlink('./upload/' . $sdm->file_kk);
        $where = array("id" => $id);
        $hasil = $this->formSdm->deleteData($where, "sdm");
        $this->session->set_flashdata('pesan', 'Berhasil menghapus data!!');
        redirect(base_url('sdm/listsdm'));
    }
    public function getSdmById()
    {
        $id = $this->input->post('id');
        $data['sdm'] = $this->formSdm->getSdmById($id);
        $data['jk'] = $this->formSdm->getJk();
        $data['agama'] = $this->formSdm->getAgama();
        $data['status'] = $this->formSdm->getStatus();
        $data['golDarah'] = $this->formSdm->getGolDarah();
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
