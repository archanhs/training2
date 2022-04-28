<?php $this->load->view('Layout/sidebar-informasi-khusus'); ?>

<h3>1.A.8.B.3. Kepintaran</h3>
<div class="table-responsive border border-secondary rounded-3 border-3 p-2">
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Kepintaran</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kepintaran as $key => $value) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $value->kode ?></td>
                    <td><?= $value->kepintaran ?></td>
                    <td>
                        <div class="d-flex">
                            <button type="button" class="btn btn-warning btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit" id_row=<?= $value->id ?>><i class="fa fa-pencil"></i></button>
                            <form action="<?= base_url() ?>form2/deletekepintaran" method="POST">
                                <input type="hidden" name="id" value="<?= $value->id ?>">
                                <input type="hidden" name="name" value="<?= $value->kepintaran ?>">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah
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
            <form action="<?= base_url('form2/addkepintaran') ?>" method="POST">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kode</label>
                        <input type="text" class="form-control" name="kode" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Kepintaran</label>
                        <input type="text" class="form-control" name="kepintaran" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit <?= $subpage ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('form2/updatekepintaran') ?>" method="POST" id="formInput">
                <div class="modal-body isi-modal-edit">


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
    $(".btn-edit").on("click", function() {
        var id = $(this).attr('id_row');
        $.ajax('<?= base_url('form2/getkepintaranbyid') ?>', {
            type: 'POST', // http method
            data: {
                id: id
            }, // data to submit
            success: function(data, status, xhr) {
                var html = `<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Kode</label>
						<input type="text" class="form-control" name="kode" value="${data.kode}" required>
						<input type="hidden" name="id" value="${data.id}" >
                        <input type="hidden" name="old" value="${data.kepintaran}" >
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">kepribadian</label>
						<input type="text" class="form-control" name="kepintaran" value="${data.kepintaran}" required>
					</div>`;
                $(".isi-modal-edit").html(html);
            }
        });

    });
</script>