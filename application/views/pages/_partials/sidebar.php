<!-- Sidebar -->
<ul class="sidebar navbar-nav">
	<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('employee') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Overview</span>
		</a>
	</li>
	<li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active' : '' ?>">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
		   aria-haspopup="true"
		   aria-expanded="false">
			<span>Employee</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<a class="dropdown-item" href="<?php echo site_url('employee/add') ?>">New Employee</a>
			<a class="dropdown-item" href="<?php echo site_url('employee') ?>">List Employee</a>
		</div>
	</li>
</ul>
