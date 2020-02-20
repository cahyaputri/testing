<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("pages/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("pages/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("pages/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<div class="clearfix">
					<h3>Daftar Employee</h3>
				</div>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('employee/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Name</th>
										<th>NPK</th>
										<th>Photo</th>
										<th>Jenis Kelamin</th>
										<th>Tanggal Lahir</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($dtemp as $dtemployee): ?>
									<tr>
										<td width="150">
											<?php echo $dtemployee->name ?>
										</td>
										<td>
											<?php echo $dtemployee->npk ?>
										</td>
										<td>
											<img src="<?php echo base_url('upload/'.$dtemployee->image) ?>" width="64" />
										</td>
										<td>
											<?php echo $dtemployee->jenis_kelamin ?>
										</td>
										<td>
											<?php echo $dtemployee->tanggal_lahir ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('employee/edit/'.$dtemployee->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('employee/delete/'.$dtemployee->id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("pages/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("pages/_partials/scrolltop.php") ?>
	<?php $this->load->view("pages/_partials/modal.php") ?>

	<?php $this->load->view("pages/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
