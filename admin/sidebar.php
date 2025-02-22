<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
			style="opacity: .8">
		<span class="brand-text font-weight-light">Admin</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
			with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="index.php" class="nav-link <?php if($currentPage =='dashboard'){echo 'active';}?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
							<!-- <i class="right fas fa-angle-left"></i> -->
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="nav.php" class="nav-link <?php if($currentPage =='nav'){echo 'active';}?>">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Navigation
							<span class="right badge badge-danger"></span>
						</p>
					</a>
					<ul>
						<li class="nav-item">
							<a href="nav-list.php">Navigation list</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="banners.php" class="nav-link <?php if($currentPage =='banners'){echo 'active';}?>">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Banners
							<!-- <i class="fas fa-angle-left right"></i> -->
							<span class="badge badge-info right"></span>
						</p>
					</a>

					<ul>
						<li class="nav-item">
							<a href="banner-list.php">Banner list</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>