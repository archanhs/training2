<?php $this->load->view('Layout/header'); ?>
<div class="container-fluid">
	<div class="row mt-4">
		<div class="col-4">
			<h3>1.A.1. Informasi Umum</h3>
			<div class="list-group">
				<a href="<?= base_url() ?>" class="list-group-item list-group-item-action list-group-item-dark <?= ($subpage == 'Jenis Kelamin') ? "active" : "" ?>">1.A.1.B.1. Jenis
					Kelamin*</a>
				<a href="<?= base_url('form1/agama') ?>" class="list-group-item list-group-item-action list-group-item-dark <?= ($subpage == 'Agama') ? "active" : "" ?>">1.A.1.B.2. Agama*</a>
				<a href="<?= base_url('form1/status') ?>" class="list-group-item list-group-item-action list-group-item-dark <?= ($subpage == 'Status') ? "active" : "" ?>">1.A.1.B.3. Status Sekarang*</a>
				<a href="<?= base_url('form1/goldarah') ?>" class="list-group-item list-group-item-action list-group-item-dark <?= ($subpage == 'Gol Darah') ? "active" : "" ?>">1.A.1.B.4. Gol. Darah*</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-dark">1.A.1.B.5. Ukuran Baju*</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-dark">1.A.1.B.6. Riwayat
					Penyakit*</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-dark">1.A.1.B.7. Tujuan Bekerja*</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-dark">1.A.1.B.8. Daftar Bagian*</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-dark">1.A.1.B.9. Aktivitas Lain*</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-dark">1.A.1.B.10. Status Keluarga*</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-dark">1.A.1.B.11. Penghasilan Orang
					Tua*</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-dark">1.A.1.B.12. Jumlah
					Tanggungan*</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-dark">1.A.1.B.13. Status Orang
					Tua*</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-dark">1.A.1.B.14. Jenis Pekerjaan*</a>
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