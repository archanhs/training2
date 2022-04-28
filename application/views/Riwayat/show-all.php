<?php $this->load->view('Layout/header'); ?>

<div class="container mt-4 border border-secondary rounded-3 border-3 p-3">
    <h3>List Riwayat <?php echo str_replace("_", " ", $table); ?></h3>
    <div class="table-responsive">
        <table class="table table-hover" id="myTable">
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
    </div>
</div>



<?php $this->load->view('Layout/footer'); ?>