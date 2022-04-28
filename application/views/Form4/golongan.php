<?php $this->load->view('Layout/sidebar-format-payroll'); ?>

<h3>1.A.2.B.2. Golongan</h3>
<div class="accordion border border-secondary rounded-3 border-3 p-2" id="accordionPanelsStayOpenExample">
    <?php foreach ($golongan as $value) { ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">

                <button class="accordion-button" style="display:block" type="button" data-bs-target="#panelsStayOpen-collapse<?= $value->id ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?= $value->id ?>">
                    <?= $value->kode ?> <?= $value->golongan ?>
                    <a href="" class="ms-2 btn-hapus-golongan" onclick="return confirm('Are You Sure Delete <?= $value->golongan ?>?')" style="float: right;" id_golongan=<?= $value->id ?>><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    <a href="" class="ms-2 btn-edit-golongan" style="float: right;" data-bs-toggle="modal" data-bs-target="#modalEditGolongan" id_golongan=<?= $value->id ?>><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </button>

            </h2>
            <div id="panelsStayOpen-collapse<?= $value->id ?>" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading<?= $value->id ?>">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Sub Golongan</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $key = 1;
                                foreach ($sub_golongan as $value1) {
                                    if ($value1->golongan == $value->id) {
                                ?>
                                        <tr>
                                            <th scope="row"><?= $key ?></th>
                                            <td><?= $value1->kode ?></td>
                                            <td><?= $value1->sub_golongan ?></td>
                                            <td><?= rupiah($value1->nominal) ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-warning btn-sm btn-edit-sub-golongan" data-bs-toggle="modal" data-bs-target="#modalEditSubGolongan" id_sub_golongan=<?= $value1->id ?>><i class="fa fa-pencil"></i></button>
                                                    <form action="<?= base_url() ?>form4/deletesubgolongan" method="POST">
                                                        <input type="hidden" name="id" value="<?= $value1->id ?>">
                                                        <input type="hidden" name="name" value="<?= $value1->sub_golongan ?>">
                                                        <button class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                <?php $key++;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm btn-sub-golongan" data-bs-toggle="modal" data-bs-target="#exampleSubGolongan" id_golongan=<?= $value->id ?>>
                        Tambah Sub Golongan
                    </button>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="mt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Golongan
        </button>
    </div>

</div>


<!-- Modal Add -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $subpage ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('form4/addgolongan') ?>" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kode</label>
                        <input type="text" class="form-control" name="kode" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Golongan</label>
                        <input type="text" class="form-control" name="golongan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Add Sub Golongan-->
<div class="modal fade" id="exampleSubGolongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Golongan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('form4/addsubgolongan') ?>" method="POST">
                <div class="modal-body isi-modal-sub-golongan">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kode</label>
                        <input type="text" class="form-control" name="kode" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Sub Golongan</label>
                        <input type="text" class="form-control" name="golongan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Golongan -->
<div class="modal fade" id="modalEditGolongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit <?= $subpage ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('form4/updategolongan') ?>" method="POST" id="formInput">
                <div class="modal-body isi-modal-edit-golongan">


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Edit Sub Golongan -->
<div class="modal fade" id="modalEditSubGolongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sub Golongan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('form4/updatesubgolongan') ?>" method="POST" id="formInput">
                <div class="modal-body isi-modal-edit-sub-golongan">


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
    $(".btn-sub-golongan").on("click", function() {
        var golongan = $(this).attr('id_golongan');
        var html = ` <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kode</label>
                        <input type="text" class="form-control" name="kode" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Sub Golongan</label>
                        <input type="text" class="form-control" name="subGolongan" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nominal</label>
                        <input type="number" class="form-control" name="nominal" required>
                    </div>
                    <input type="hidden" value="${golongan}" class="form-control" name="golongan">
                    `;
        $(".isi-modal-sub-golongan").html(html);
    });
    $(".btn-edit-golongan").on("click", function() {
        var id = $(this).attr('id_golongan');
        $.ajax('<?= base_url('form4/getgolonganbyid') ?>', {
            type: 'POST', // http method
            data: {
                id: id
            }, // data to submit
            success: function(data, status, xhr) {
                var html = `<div class="mb-3">
        				<label for="exampleInputEmail1" class="form-label">Kode</label>
        				<input type="text" class="form-control" name="kode" value="${data.kode}" required>
        				<input type="hidden"name="id" value="${data.id}">
                        <input type="hidden" name="old" value="${data.golongan}">
                        <input type="hidden" name="oldKode" value="${data.kode}">
        			</div>
                    <div class="mb-3">
        				<label for="exampleInputPassword1" class="form-label">Golongan</label>
        				<input type="text" class="form-control" name="golongan" value="${data.golongan}" required>
        			</div>
                    `;
                $(".isi-modal-edit-golongan").html(html);
            }
        });

    });
    $(".btn-edit-sub-golongan").on("click", function() {
        var id = $(this).attr('id_sub_golongan');
        $.ajax('<?= base_url('form4/getsubgolonganbyid') ?>', {
            type: 'POST', // http method
            data: {
                id: id
            }, // data to submit
            success: function(data, status, xhr) {
                var html = `<div class="mb-3">
        				<label for="exampleInputEmail1" class="form-label">Kode</label>
        				<input type="text" class="form-control" name="kode" value="${data.kode}" required>
        				<input type="hidden"name="id" value="${data.id}">
                        <input type="hidden" name="old" value="${data.sub_golongan}">
                        <input type="hidden" name="golongan" value="${data.golongan_nama}">
                        <input type="hidden" name="oldNominal" value="${data.nominal}">
        			</div>
                    <div class="mb-3">
        				<label for="exampleInputPassword1" class="form-label">Sub Golongan</label>
        				<input type="text" class="form-control" name="subGolongan" value="${data.sub_golongan}" required>
        			</div>
                    <div class="mb-3">
        				<label for="exampleInputPassword1" class="form-label">Nominal</label>
        				<input type="text" class="form-control" name="nominal" value="${data.nominal}" required>
        			</div>
                    `;
                $(".isi-modal-edit-sub-golongan").html(html);
            }
        });

    });
    $(".btn-hapus-golongan").on("click", function() {
        var id = $(this).attr('id_golongan');
        var golongan = $(this).attr('nama_golongan');
        $.ajax('<?= base_url('form4/deletegolongan') ?>', {
            type: 'POST', // http method
            data: {
                id: id,
                name: golongan,
            }, // data to submit
            success: function(data, status, xhr) {
                console.log("sukses");
            }
        });

    });
</script>