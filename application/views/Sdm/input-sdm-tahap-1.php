<?php $this->load->view('Layout/header'); ?>
<div class="container p-4 mt-4 bg-light">
    <?php if (isset($_SESSION['pesan'])) { ?>
        <script>
            Swal.fire("Success", "<?= $_SESSION['pesan'] ?>", "success");
        </script>
    <?php } ?>

    <h3 class="mb-3">1.A.1.B.1. Informasi Umum</h3>
    <form action="<?= base_url('sdm/addsdm') ?>" enctype='multipart/form-data' method="POST">
        <div class="border border-secondary rounded-3 border-3 p-4 m-1">

            <div class="row">
                <div class="col-3">1.A.1.B.1.1. Data Pribadi</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name='nama' aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Panggilan</label>
                        <input type="text" class="form-control" name='panggilan'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name='jk' aria-label="Default select example">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <?php foreach ($jk as $value) { ?>
                                <option value="<?= $value->jenis_kelamin ?>"><?= $value->jenis_kelamin ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name='tempat_lahir'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name='tanggal_lahir'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Alamat Sesuai KTP</label>
                        <input type="text" class="form-control" name='alamat'>
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
                            <option value="">-- Pilih Kabupaten --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">No. Handphone</label>
                        <input type="phone" class="form-control" name='telp'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">NIK KTP</label>
                        <input type="number" class="form-control" name='nik'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Agama</label>
                        <select class="form-select" name='agama'>
                            <option value="">-- Pilih Agama --</option>
                            <?php foreach ($agama as $value) { ?>
                                <option value="<?= $value->agama ?>"><?= $value->agama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status Sekarang</label>
                        <select class="form-select" name='status'>
                            <option value="">-- Pilih Status --</option>
                            <?php foreach ($status as $value) { ?>
                                <option value="<?= $value->status ?>"><?= $value->status ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <div class="border border-secondary rounded-3 border-3 p-4 m-1">

            <div class="row">
                <div class="col-3">1.A.1.B.1.2. Data Fisik</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Golongan Darah</label>
                        <select class="form-select" name='gol_darah'>
                            <option value="">-- Pilih Gol Darah --</option>
                            <?php foreach ($golDarah as $value) { ?>
                                <option value="<?= $value->gol_darah ?>"><?= $value->gol_darah ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tinggi Badan</label>
                        <input type="number" class="form-control" name='tinggi' placeholder="cm">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Berat Badan</label>
                        <input type="number" class="form-control" name='berat' placeholder="kg">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Ukuran Baju</label>
                        <input type="text" class="form-control" name='baju'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Riwayat Penyakit</label>
                        <input type="text" class="form-control" name='penyakit'>
                    </div>
                </div>

            </div>
        </div>
        <div class="border border-secondary rounded-3 border-3 p-4 m-1">

            <div class="row">
                <div class="col-3">1.A.1.B.1.3. Data Media Sosial</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Instagram</label>
                        <input type="text" class="form-control" name='ig'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Facebook</label>
                        <input type="text" class="form-control" name='fb'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Twitter</label>
                        <input type="text" class="form-control" name='tw'>
                    </div>
                </div>
            </div>
        </div>
        <div class="border border-secondary rounded-3 border-3 p-4 m-1">

            <div class="row">
                <div class="col-3">1.A.1.B.1.4. Pengalaman Sebelumnya</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name='pendidikan'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tujuan Bekerja</label>
                        <input type="text" class="form-control" name='tujuan'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pernah Bekerja di</label>
                        <input type="text" class="form-control" name='pernah_bekerja'>
                    </div>
                </div>
            </div>
        </div>
        <div class="border border-secondary rounded-3 border-3 p-4 m-1">

            <div class="row">
                <div class="col-3">1.A.1.B.1.5. Data Pendaftaran</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Pemanggilan</label>
                        <input type="date" class="form-control" name='date_pemanggilan'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Daftar di Bagian</label>
                        <input type="text" class="form-control" name='daftar_bagian'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Aktivitas di Luar Lain</label>
                        <input type="text" class="form-control" name='aktivitas_diluar'>
                    </div>
                </div>
            </div>
        </div>
        <div class="border border-secondary rounded-3 border-3 p-4 m-1">

            <div class="row">
                <div class="col-3">1.A.1.B.1.6. Data Keluarga</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nomor Kerabat/ Keluarga</label>
                        <input type="phone" class="form-control" name='no_kerabat'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Alamat Orang Tua Saat ini</label>
                        <input type="text" class="form-control" name='alamat_ortu'>
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
                            <option value="">-- Pilih Kabupaten --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status Orang Tua</label>
                        <input type="text" class="form-control" name='status_ortu'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Penghasilan Orang Tua</label>
                        <input type="number" class="form-control" name='penghasilan_ortu'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Jumlah Tanggungan Orang Tua</label>
                        <input type="number" class="form-control" name='tanggungan_ortu'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Lengkap Ayah</label>
                        <input type="text" class="form-control" name='nama_ayah'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status Ayah</label>
                        <input type="text" class="form-control" name='status_ayah'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" name='pekerjaan_ayah'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Lengkap Ibu</label>
                        <input type="text" class="form-control" name='nama_ibu'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status Ibu</label>
                        <input type="text" class="form-control" name='status_ibu'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" name='pekerjaan_ibu'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pekerjaan Saudara 1</label>
                        <input type="text" class="form-control" name='pekerjaan_saudara1'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pekerjaan Saudara 2</label>
                        <input type="text" class="form-control" name='pekerjaan_saudara2'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pekerjaan Saudara 3</label>
                        <input type="text" class="form-control" name='pekerjaan_saudara3'>
                    </div>
                </div>
            </div>
        </div>
        <div class="border border-secondary rounded-3 border-3 p-4 m-1">

            <div class="row">
                <div class="col-3">1.A.1.B.1.U. Upload Data</div>
                <div class="col-9">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto Diri</label>
                        <input type="file" class="form-control" accept="image/*" id="exampleInputPassword1" name='foto_diri'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto Kartu Tanda Penduduk</label>
                        <input type="file" class="form-control" accept="image/*" id="exampleInputPassword1" name='foto_ktp'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto Kartu Keluarga</label>
                        <input type="file" class="form-control" accept="image/*" id="exampleInputPassword1" name='foto_kk'>
                    </div>
                </div>
            </div>
        </div>
        <div align="center" class="mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

<?php $this->load->view('Layout/footer'); ?>
<script>
    $(document).ready(function() {
        var html = "";
        $.ajax('http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', {
            type: 'GET',
            success: function(data, status, xhr) {
                html += `<option value="">-- Select Provinsi --</option>`;
                data.forEach(value => {
                    html += ` 
                        <option value="${value.name}" data-id='${value.id}'>${value.name}</option>`;
                });
                $(".select-provinsi").html(html);

            }
        });
        var html = "";
        $.ajax('http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', {
            type: 'GET',
            success: function(data, status, xhr) {
                html += `<option value="">-- Select Provinsi --</option>`;
                data.forEach(value => {
                    html += ` 
                        <option value="${value.name}" data-id='${value.id}'>${value.name}</option>`;
                });
                $(".select-provinsi-ortu").html(html);

            }
        });
        $(".select-provinsi").on("change", function() {
            html = "";
            var id_provinsi = $('option:selected', this).attr('data-id');
            $.ajax('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + id_provinsi + '.json', {
                type: 'GET',
                success: function(data, status, xhr) {
                    html += `<option value="">-- Pilih Kabupaten --</option>`;
                    data.forEach(value => {
                        html += ` 
                        <option value="${value.name}">${value.name}</option>`;
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
                success: function(data, status, xhr) {
                    html += `<option value="">-- Pilih Kabupaten --</option>`;
                    data.forEach(value => {
                        html += ` 
                        <option value="${value.name}">${value.name}</option>`;
                    });
                    $(".select-kabupaten-ortu").html(html);

                }
            });
        });

    });
</script>