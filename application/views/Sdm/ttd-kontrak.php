<?php error_reporting(0) ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tanda Tangan Digital</title>
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

        .container {
            margin-left: 220px;
            margin-right: 220px;
            margin-top: 30px;
        }

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
            text-align: center
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
                Surat perjanjian kerja ini berlaku selama
                <span>
                    <select name="" id="lama-kontrak">
                        <option value="0">-- pilih --</option>
                        <option value="1">1 Bulan</option>
                        <option value="3">3 Bulan</option>
                        <option value="12">12 Bulan</option>
                    </select>
                    <input type="hidden" id="date" value="<?= $date ?>">
                    <input type="hidden" id="dateExDb" value="">
                </span>
                dari <?= tgl_indo($date) ?> sampai dengan <span class="dateEx">-</span> selama kurun waktu tersebut pihak kedua akan menjadi karyawan di PT.XYZ.
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
        <br>
        <div align="right" style="margin-right: 60px;">
            Karanganyar, <?= tgl_indo($date) ?>
        </div>
        <br>
        <br>
        <div class="footer">
            <div class="row">
                <div class="col">
                    <div class="ttd">
                        Pihak Pertama
                    </div>
                </div>
                <div class="col">
                    <div class="ttd">
                        Pihak Kedua
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="ttd">
                        <canvas class="canvas ttd1" id="myCanvas1" width="210px" height="120px"></canvas>
                        <div class="wrapper">
                            <button class="btn-clear1">Clear</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="ttd">
                        <canvas class="canvas ttd2" id="myCanvas2" width="210px" height="120px"></canvas>
                        <div class="wrapper">
                            <button class="btn-clear2">Clear</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="ttd">
                        <?= $sdm->nama ?>
                    </div>
                </div>
                <div class="col">
                    <div class="ttd">
                        -
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <center> <button class="btn">Simpan</button></center>
        <br><br><br>

    </div>






    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script type="text/javascript">
        var canvas1 = document.querySelector(".ttd1");
        var signaturePad1 = new SignaturePad(canvas1);
        var canvas2 = document.querySelector(".ttd2");
        var signaturePad2 = new SignaturePad(canvas2);
        $(document).on('click', '.btn', function() {
            var signature1 = signaturePad1.toDataURL();
            var signature2 = signaturePad2.toDataURL();
            var dateEx = $('#dateExDb').val();
            var lama = $('#lama-kontrak').val();

            $.ajax({
                url: "<?= base_url("sdm/addkontrak") ?>",
                data: {
                    signature1: signature1,
                    signature2: signature2,
                    dateEx: dateEx,
                    sdm: <?= $sdm->id ?>,
                    lama: lama,
                },
                method: "POST",
                success: function() {
                    window.location = '<?= base_url("sdm/redirectlist") ?>';
                }

            })
        })
        $('.btn-clear1').click(function(e) {
            let myCanvas = document.getElementById('myCanvas1');
            let ctx = myCanvas.getContext('2d');
            ctx.clearRect(0, 0, myCanvas.width, myCanvas.height);
        });
        $('.btn-clear2').click(function(e) {
            let myCanvas = document.getElementById('myCanvas2');
            let ctx = myCanvas.getContext('2d');
            ctx.clearRect(0, 0, myCanvas.width, myCanvas.height);
        });
        $('#lama-kontrak').on("change", function() {
            var monthNumber = ["01", "02", "03", "04", "05", "06",
                "07", "08", "09", "10", "11", "12"
            ];
            var monthName = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];
            var date = $("#date").val();
            var bulan = $(this).val();
            const dateArray = date.split("-");
            var dateEx = new Date(dateArray[0], dateArray[1], dateArray[2]);
            dateEx.setMonth(dateEx.getMonth() + parseInt(bulan) - 1)
            dateDb = dateEx.getFullYear() + "-" + monthNumber[dateEx.getMonth()] + "-" + dateEx.getDate();
            dateString = dateEx.getDate() + " " + monthName[dateEx.getMonth()] + " " + dateEx.getFullYear();
            $('.dateEx').html(dateString);
            $('#dateExDb').val(dateDb);
        })
    </script>
</body>

</html>