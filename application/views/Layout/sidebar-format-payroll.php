<?php $this->load->view('Layout/header'); ?>
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-4">
            <h3>A.2. Format Payroll</h3>
            <div class="list-group">
                <a href="<?= base_url("form4") ?>" class="list-group-item list-group-item-action  list-group-item-dark <?= ($subpage == 'Gaji Pokok') ? "active" : "" ?>">1.A.2.B.1. Gaji Pokok</a>
                <a href="<?= base_url('form4/golongan') ?>" class="list-group-item list-group-item-action list-group-item-dark <?= ($subpage == 'Golongan') ? "active" : "" ?>">1.A.2.B.2. Golongan</a>
            </div>
            <h3 class="mt-3">Riwayat Versi</h3>
            <div class="border border-secondary rounded-3 border-3 p-2">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Date</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($riwayat as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $value->date ?></td>
                                <td><?= $value->keterangan ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="<?= base_url('riwayat/showall/' . $table) ?>"><button type="button" class="btn btn-primary btn-sm">Show All</i></button></a>
            </div>


        </div>
        <div class="col-8">
            <?php if (isset($_SESSION['pesan'])) { ?>
                <script>
                    Swal.fire("Success", "<?= $_SESSION['pesan'] ?>", "success");
                </script>
            <?php } ?>