<?php
$profile = new App\Models\User();
$profile = $profile->find(session()->get('SES_AUTH_USER_ID'));

$firstName = explode(" ", $profile['name'])[0];
?>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
	<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
		<div class="navbar-nav align-items-center">
			<a href="<?= site_url('/') ?>" class="app-brand-link">
				<img src="/logo.png" alt="Tokori" class="w-brand-customer">
				<span class="app-brand-text demo menu-text fw-bolder ms-2 sm-hidden">Tokori.</span>
			</a>
		</div>
		<ul class="navbar-nav flex-row align-items-center ms-auto">
			<li class="nav-item navbar-dropdown dropdown-user dropdown">
				<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
					<div class="d-flex justify-content-center align-items-center">
						<div class="flex-grow-1">
							<span class="fw-semibold d-flex align-items-center"><?= $firstName ?> <i class="bx bxs-chevron-down"></i></span>
						</div>
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<a class="dropdown-item" href="<?= site_url('/'); ?>">
							<i class="bx bx-grid-alt me-2"></i>
							<span class="align-middle">Dashboard</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>