<?php error_reporting(0) ?>
<!DOCTYPE html>
<html>

<head>
    <title>Kontrak</title>
    <style type="text/css">
        .canvas {
            background: #fff;
            border: 1px solid #000
        }

        .wrapper {
            background: #fff;

            float: right;
        }

        .kop {
            padding: 0;
            font-size: 14;
        }

        h4 {
            padding: 0;
        }

        .container {}

        .isi {
            margin-top: 20px;
            font-size: 12;
            text-align: justify;
            text-justify: inter-word;
        }

        .id {
            margin-left: 30px;
        }

        .row {
            margin: 0 auto;
            overflow: hidden;
        }

        .col {
            width: 50%;
            float: left;
            text-align: center;
        }

        .ttd {
            display: flex;

        }

        .footer {
            margin-left: 30px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="kop" align='center'>
            SURAT PERJANJIAN KERJA <br>
            Nomor : 378/SPK-RM/VIV/2017
        </div>
        <div class="isi">
            Pada tanggal <?= tgl_indo($date) ?> telah dibuat kesepakatan oleh kedua belah pihak yakni perjanjian kerja antara
            <br>
            <br>
            <table class="id">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td> -</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td> -</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td> -</td>
                </tr>
            </table>
            Dalam hal ini bertindak dan atas nama PT.XYZ yang mana disebut sebagai pihak pertama.
            <br>
            <br>
            <table class="id">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td> <?= $sdm->nama ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td>:</td>
                    <td> <?= $sdm->tempat_lahir ?>, <?= tgl_indo($sdm->tanggal_lahir) ?></td>
                </tr>
                <tr>
                    <td>No. KTP</td>
                    <td>:</td>
                    <td> <?= $sdm->nik ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td> <?= $sdm->alamat ?></td>
                </tr>
            </table>
            Dalam hal ini bertindak untuk dan atas nama sendiri dalam perjanjian kerja ini yang mana selanjutnya akan disebut sebagai pihak kedua.
            <br>
            <br>
            Kedua belah pihak terlah sepakat untuk mengikatkan diri dalam sebuah perjanjian kerja dengan ketentuan sebagai berikut:
            <br>
            <br>
            <div class="kop" align='center'>
                PASAL 1 KETENTUAN UMUM
            </div>
            <br>
            <div>
                <table class="id">
                    <tr>
                        <td valign="top">1. </td>
                        <td>Pihak pertama punya kuasa penuh atas segala kebijakan serta perturan dalam perusahaan. Pihak pertama pun berhak untuk pemutus ataupun melanjutkan kontrak dengan pihak kedua</td>
                    </tr>
                    <tr>
                        <td valign="top">2. </td>
                        <td>Pihak kedua bersedia menjadi karyawan pada pihak pertama dalam jabatan</td>
                    </tr>
                </table>
            </div>
            <br>

            <div class="kop" align='center'>
                PASAL 2 WAKTU KONTRAK
            </div>
            <br>
            <div>
                Surat perjanjian kerja ini berlaku selama <?= tgl_indo($kontrak->lama_kontrak) ?> bulan dari <?= tgl_indo($kontrak->mulai) ?> sampai dengan <?= tgl_indo($kontrak->selesai) ?> selama kurun waktu tersebut pihak kedua akan menjadi karyawan di PT.XYZ.
            </div>
            <br>
            <div class="kop" align='center'>
                PASAL 3 WAKTU KERJA DAN UPAH
            </div>
            <br>
            <div>
                Pihak kedua wajib untuk memenuhi waktu kerja selama 7 (tujuh) jam dalam sehari dan 6 (enam) hari selama seminggu. pihak kedua juga akan menerima upah sebesar Rp. 3.000.000,00 dengan tunjanagan (makan, transportasi dan kesehatan) sebesar Rp. 2.500.000,00. Sehingga total gaji pihak kedua sebesar Rp 5.500.000,00
            </div>
        </div>
        <br>
        <div align="right" style="margin-right: 60px;">
            Karanganyar, <?= tgl_indo($kontrak->mulai) ?>
        </div>
        <br>
        <div>
            <table width="100%">
                <tr>
                    <td align="center">Pihak Pertama</td>
                    <td align="center">Pihak Kedua</td>
                </tr>
                <tr>
                    <td align="center"><img src="<?= base_url('/upload/' . $kontrak->signature_1) ?>" alt="" width="200px"></td>
                    <td align="center"><img src="<?= base_url('/upload/' . $kontrak->signature_2) ?>" alt="" width="200px"></td>
                </tr>
                <tr>
                    <td align="center"><?= $sdm->nama ?></td>
                    <td align="center">-</td>
                </tr>
            </table>
        </div>

    </div>

</body>

</html>