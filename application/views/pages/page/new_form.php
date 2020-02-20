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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('employee/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('employee/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Name*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="Name" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="npk">NPK*</label>
								<input class="form-control <?php echo form_error('npk') ? 'is-invalid':'' ?>"
								 type="number" name="npk" min="0" placeholder="Your NPK..." />
								<div class="invalid-feedback">
									<?php echo form_error('npk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="image">Photo</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="jenis_kelamin">Jenis Kelamin*</label>
								<input class="form-control <?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>"
									   type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" />
								<div class="invalid-feedback">
									<?php echo form_error('jenis_kelamin') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="tanggal_lahir">Tanggal Lahir*</label>
								<input class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid':'' ?>"
									   type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_lahir') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("pages/_partials/js.php") ?>

</body>

</html>
