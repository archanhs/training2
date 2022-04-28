<?php $this->load->view('Layout/header'); ?>
<div class="container p-4 mt-4 bg-light">
    <?php if (isset($_SESSION['pesan'])) { ?>
        <script>
            Swal.fire("Success", "<?= $_SESSION['pesan'] ?>", "success");
        </script>
    <?php } ?>

    <h3 class="mb-3"><?= $subPage ?></h3>
    <div class="border border-secondary rounded-3 border-3 p-4 m-1">
        <div class="table-responsive">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No telp</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sdm as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $value->nama ?></td>
                            <td><?= $value->alamat ?></td>
                            <td><?= $value->no_telp ?></td>
                            <td>
                                <div class="d-flex">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Detail
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <?php if ($value->status_sdm == 0) { ?>
                                                    <li><a class="dropdown-item" href="<?= base_url("sdm/ttdkontrak/") . $value->id ?>">Tanda Tangan Kontrak</a></li>
                                                <?php } else { ?>
                                                    <li><a class="dropdown-item" href="<?= base_url("sdm/getKontrak/") . $value->id ?>">Lihat Kontrak</a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-warning btn-detail" data-bs-toggle="modal" data-bs-target="#modalDetail" id_row=<?= $value->id ?>><i class="fa fa-pencil"></i></button>
                                    <form action="<?= base_url() ?>sdm/deletesdm" method="POST">
                                        <input type="hidden" name="id" value="<?= $value->id ?>">
                                        <input type="hidden" name="name" value="<?= $value->nama ?>">
                                        <button type="submit" class="btn btn-danger btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>

                                </div>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


    </div>

</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sdm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('sdm/updatesdm') ?>" enctype='multipart/form-data' method="POST">
                <div class="modal-body isi-modal-detail">

                    <div class="panel-body isi-modal m-3">



                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $this->load->view('Layout/footer'); ?>
<script>
    $(".btn-detail").on("click", function() {
        var id = $(this).attr('id_row');
        $.ajax('<?= base_url('sdm/getsdmbyid') ?>', {
            type: 'POST', // http method
            data: {
                id: id
            }, // data to submit
            success: function(data, status, xhr) {
                html = `
            <div class="row">
                <div class="col-3">1.A.1.B.1.1. Data Pribadi</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name='nama' aria-describedby="emailHelp" value=${data.sdm.nama}>
                        <input type="hidden" class="form-control" name='id' aria-describedby="emailHelp" value=${data.sdm.id}>
                        <input type="hidden" class="form-control" name='old_ktp' aria-describedby="emailHelp" value=${data.sdm.file_ktp}>
                        <input type="hidden" class="form-control" name='old_diri' aria-describedby="emailHelp" value=${data.sdm.file_foto}>
                        <input type="hidden" class="form-control" name='old_kk' aria-describedby="emailHelp" value=${data.sdm.file_kk}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Panggilan</label>
                        <input type="text" class="form-control" name='panggilan' value=${data.sdm.panggilan}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name='jk' aria-label="Default select example">
                        <option value = "" > --Pilih Jenis Kelamin-- </option>`

                data.jk.forEach(element => {
                    if (element.jenis_kelamin == data.sdm.jenis_kelamin) {
                        html += `<option value = "${element.jenis_kelamin}" selected> ${element.jenis_kelamin} </option>`
                    } else {
                        html += ` <option value = "${element.jenis_kelamin}" > ${element.jenis_kelamin} </option>`
                    }
                });
                html += `</select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name='tempat_lahir' value=${data.sdm.tempat_lahir}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name='tanggal_lahir' value=${data.sdm.tanggal_lahir}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Alamat Sesuai KTP</label>
                        <input type="text" class="form-control" name='alamat' value=${data.sdm.alamat}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Provinsi</label>
                        <select class="form-select select-provinsi" name='provinsi' required>
                            <option value="">-- Pilih Provinsi --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Kota/Kabupaten</label>
                        <select class="form-select select-kabupaten" name='kabupaten' required>
                            <option value="${data.sdm.kabupaten}">${data.sdm.kabupaten}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">No. Handphone</label>
                        <input type="phone" class="form-control" name='telp' value=${data.sdm.no_telp}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">NIK KTP</label>
                        <input type="number" class="form-control" name='nik' value=${data.sdm.nik}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Agama</label>
                        <select class="form-select" name='agama'>
                            <option value="">-- Pilih Agama --</option>`
                data.agama.forEach(element => {
                    if (element.agama == data.sdm.agama) {
                        html += `<option value = "${element.agama}" selected> ${element.agama} </option>`
                    } else {
                        html += ` <option value = "${element.agama}" > ${element.agama} </option>`
                    }
                });
                html += `</select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status Sekarang</label>
                        <select class="form-select" name='status'>
                            <option value="">-- Pilih Status --</option>`
                data.status.forEach(element => {
                    if (element.status == data.sdm.status) {
                        html += `<option value = "${element.status}" selected> ${element.status} </option>`
                    } else {
                        html += ` <option value = "${element.status}" > ${element.status} </option>`
                    }
                });
                html += `</select>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-3">1.A.1.B.1.2. Data Fisik</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Golongan Darah</label>
                        <select class="form-select" name='gol_darah'>
                            <option value="">-- Pilih Gol Darah --</option>`
                data.golDarah.forEach(element => {
                    if (element.gol_darah == data.sdm.gol_darah) {
                        html += `<option value = "${element.gol_darah}" selected> ${element.gol_darah} </option>`
                    } else {
                        html += ` <option value = "${element.gol_darah}" > ${element.gol_darah} </option>`
                    }
                });
                html += `</select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tinggi Badan</label>
                        <input type="number" class="form-control" name='tinggi' placeholder="cm" value=${data.sdm.tinggi_badan}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Berat Badan</label>
                        <input type="number" class="form-control" name='berat' placeholder="kg" value=${data.sdm.berat_badan}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Ukuran Baju</label>
                        <input type="text" class="form-control" name='baju' value=${data.sdm.berat_badan}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Riwayat Penyakit</label>
                        <input type="text" class="form-control" name='penyakit' value=${data.sdm.riwayat_penyakit}>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-3">1.A.1.B.1.3. Data Media Sosial</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Instagram</label>
                        <input type="text" class="form-control" name='ig' value=${data.sdm.instagram}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Facebook</label>
                        <input type="text" class="form-control" name='fb' value=${data.sdm.facebook}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Twitter</label>
                        <input type="text" class="form-control" name='tw' value=${data.sdm.twitter}>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">1.A.1.B.1.4. Pengalaman Sebelumnya</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name='pendidikan' value=${data.sdm.pendidikan_terakhir}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tujuan Bekerja</label>
                        <input type="text" class="form-control" name='tujuan' value=${data.sdm.tujuan_bekerja}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pernah Bekerja di</label>
                        <input type="text" class="form-control" name='pernah_bekerja' value=${data.sdm.pernah_bekerja}>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">1.A.1.B.1.5. Data Pendaftaran</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Pemanggilan</label>
                        <input type="date" class="form-control" name='date_pemanggilan' value=${data.sdm.tanggal_pemanggilan}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Daftar di Bagian</label>
                        <input type="text" class="form-control" name='daftar_bagian' value=${data.sdm.daftar_bagian}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Aktivitas di Luar Lain</label>
                        <input type="text" class="form-control" name='aktivitas_diluar' value=${data.sdm.aktivitas_lain}>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">1.A.1.B.1.6. Data Keluarga</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nomor Kerabat/ Keluarga</label>
                        <input type="phone" class="form-control" name='no_kerabat' value=${data.sdm.no_kerabat}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Alamat Orang Tua Saat ini</label>
                        <input type="text" class="form-control" name='alamat_ortu' value=${data.sdm.alamat_ortu}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Provinsi</label>
                        <select class="form-select select-provinsi-ortu" name='provinsi_ortu' required>
                            <option value="">-- Pilih Provinsi --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Kota/Kabupaten</label>
                        <select class="form-select select-kabupaten-ortu" name='kabupaten_ortu' required>
                             <option value="${data.sdm.kabupaten_ortu}">${data.sdm.kabupaten_ortu}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status Orang Tua</label>
                        <input type="text" class="form-control" name='status_ortu' value=${data.sdm.status_ortu}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Penghasilan Orang Tua</label>
                        <input type="number" class="form-control" name='penghasilan_ortu' value=${data.sdm.penghasilan_ortu}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Jumlah Tanggungan Orang Tua</label>
                        <input type="number" class="form-control" name='tanggungan_ortu' value=${data.sdm.tanggungan_ortu}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Lengkap Ayah</label>
                        <input type="text" class="form-control" name='nama_ayah' value=${data.sdm.nama_ayah}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status Ayah</label>
                        <input type="text" class="form-control" name='status_ayah' value=${data.sdm.status_ayah}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" name='pekerjaan_ayah' value=${data.sdm.pekerjaan_ayah}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Lengkap Ibu</label>
                        <input type="text" class="form-control" name='nama_ibu' value=${data.sdm.nama_ibu}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status Ibu</label>
                        <input type="text" class="form-control" name='status_ibu' value=${data.sdm.nama_ibu}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" name='pekerjaan_ibu' value=${data.sdm.pekerjaan_ibu}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pekerjaan Saudara 1</label>
                        <input type="text" class="form-control" name='pekerjaan_saudara1' value=${data.sdm.pekerjaan_saudara_1}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pekerjaan Saudara 2</label>
                        <input type="text" class="form-control" name='pekerjaan_saudara2' value=${data.sdm.pekerjaan_saudara_2}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pekerjaan Saudara 3</label>
                        <input type="text" class="form-control" name='pekerjaan_saudara3' value=${data.sdm.pekerjaan_saudara_3}>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">1.A.1.B.1.U. Upload Data</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto Diri</label>
                        <div class="row">
                        <div class="col-3">
                        <img src = "<?= base_url('/upload/') ?>${data.sdm.file_foto}" id="thumb_img_foto" width="200px" />
                        </div>
                        <div class="col-9">
                        <input type="file" class="form-control" accept="image/*" id="img_foto" name='foto_diri'>
                        </div>
                        </div>
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto Kartu Tanda Penduduk</label>
                        <div class="row">
                        <div class="col-3">
                        <img src = "<?= base_url('/upload/') ?>${data.sdm.file_ktp}" id="thumb_img_ktp" width="200px" />
                        </div>
                        <div class="col-9">
                        <input type="file" class="form-control" accept="image/*" id="img_ktp" name='foto_ktp'>
                        </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto Kartu Keluarga</label>
                        <div class="row">
                        <div class="col-3">
                        <img src = "<?= base_url('/upload/') ?>${data.sdm.file_kk}" id="thumb_img_kk" width="200px" />
                        </div>
                        <div class="col-9">
                        <input type="file" class="form-control" accept="image/*" id="img_kk" name='foto_kk'>
                        </div>
                        </div>
                    </div>
                </div>
            </div>`
                $(".isi-modal").html(html);
                $("#img_foto").on("change", function() {
                    const imgPreview = document.querySelector("#thumb_img_foto");

                    const fileSampul = new FileReader();
                    fileSampul.readAsDataURL(this.files[0]);
                    fileSampul.onload = function(e) {
                        imgPreview.src = e.target.result;
                    }
                })
                $("#img_ktp").on("change", function() {
                    const imgPreview = document.querySelector("#thumb_img_ktp");

                    const fileSampul = new FileReader();
                    fileSampul.readAsDataURL(this.files[0]);
                    fileSampul.onload = function(e) {
                        imgPreview.src = e.target.result;
                    }
                })
                $("#img_kk").on("change", function() {
                    const imgPreview = document.querySelector("#thumb_img_kk");

                    const fileSampul = new FileReader();
                    fileSampul.readAsDataURL(this.files[0]);
                    fileSampul.onload = function(e) {
                        imgPreview.src = e.target.result;
                    }
                })
                var html = "";
                $.ajax('http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', {
                    type: 'GET',
                    success: function(data1, status, xhr) {
                        html += `<option value="">-- Select Provinsi --</option>`;
                        data1.forEach(value => {
                            if (value.name == data.sdm.provinsi) {
                                html += ` <option selected value="${value.name}" data-id='${value.id}'>${value.name}</option>`;
                            } else {
                                html += ` <option value="${value.name}" data-id='${value.id}'>${value.name}</option>`;
                            }

                        });
                        $(".select-provinsi").html(html);

                    }
                });
                var html = "";
                $.ajax('http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', {
                    type: 'GET',
                    success: function(data1, status, xhr) {
                        html += `<option value="">-- Select Provinsi --</option>`;
                        data1.forEach(value => {
                            if (value.name == data.sdm.provinsi_ortu) {
                                html += ` <option selected value="${value.name}" data-id='${value.id}'>${value.name}</option>`;
                            } else {
                                html += ` <option value="${value.name}" data-id='${value.id}'>${value.name}</option>`;
                            }
                        });
                        $(".select-provinsi-ortu").html(html);

                    }
                });
                $(".select-provinsi").on("change", function() {
                    html = "";
                    var id_provinsi = $('option:selected', this).attr('data-id');
                    $.ajax('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + id_provinsi + '.json', {
                        type: 'GET',
                        success: function(data1, status, xhr) {
                            html += `<option value="">-- Pilih Kabupaten --</option>`;
                            data1.forEach(value => {
                                html += ` <option value="${value.name}">${value.name}</option>`;
                            });
                            $(".select-kabupaten").html(html);

                        }
                    });
                });
                $(".select-provinsi-ortu").on("change", function() {
                    html = "";
                    var id_provinsi = $('option:selected', this).attr('data-id');
                    $.ajax('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + id_provinsi + '.json', {
                        type: 'GET',
                        success: function(data1, status, xhr) {
                            html += `<option value="">-- Pilih Kabupaten --</option>`;
                            data1.forEach(value => {
                                html += ` 
                        <option value="${value.name}">${value.name}</option>`;
                            });
                            $(".select-kabupaten-ortu").html(html);

                        }
                    });
                });



            }

        });

    });
</script>