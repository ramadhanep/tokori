<?php
$profile = new App\Models\User();
$profile = $profile->find(session()->get('SES_AUTH_USER_ID'));

$firstName = explode(" ", $profile['name'])[0];

$setting = new App\Models\Setting();
$setting = $setting->first();
?>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
	<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
		<div class="navbar-nav align-items-center">
			<a href="<?= site_url('/app/pos') ?>" class="app-brand-link">
				<img src="/logo.png" alt="Tokori" class="w-brand-customer">
				<span class="app-brand-text demo menu-text fw-bolder ms-2 sm-hidden">Tokori.</span>
			</a>
			<i class="mx-2 bx bx-x fw-bold text-primary"></i>
			<a href="javascript:void(0)" class="d-flex align-items-end gap-1">
				<?php if (!empty($setting['company_logo'])): ?>
					<img src="<?= $setting['company_logo'] ? "/img/companies/".$setting['company_logo'] : '/logo.png' ?>" alt="user-avatar" class="d-block rounded object-fit-cover" height="28" width="28" id="form-company-logo-view" />
				<?php else: ?>
					<i class="bx bx-buildings bx-sm"></i>
				<?php endif; ?>
				<span class="text-primary text-sm fw-bold"><?= $setting['company_name'] ?></span>
			</a>
		</div>
		<ul class="navbar-nav flex-row align-items-center ms-auto">
			<li class="nav-item navbar-dropdown dropdown-user dropdown">
				<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
					<div class="d-flex justify-content-center align-items-center">
						<div class="flex-shrink-0 me-3">
							<div class="avatar">
								<img src="/img/avatars/<?= $profile['photo'] ? $profile['photo'] : 'default.jpg' ?>" alt class="w-px-40 h-10 rounded-circle" />
							</div>
						</div>
						<div class="flex-grow-1">
							<span class="fw-semibold d-block"><?= $firstName ?></span>
							<small class="text-muted"><?= $profile['role'] ?></small>
						</div>
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<a class="dropdown-item" href="<?= site_url('profile'); ?>">
							<i class="bx bx-user me-2"></i>
							<span class="align-middle">Profil</span>
						</a>
					</li>
					<li>
						<a class="dropdown-item" href="<?= site_url('/'); ?>">
							<i class="bx bx-grid-alt me-2"></i>
							<span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li>
						<a class="dropdown-item" href="<?= site_url('settings'); ?>">
						<i class="bx bx-cog me-2"></i>
						<span class="align-middle">Pengaturan</span>
						</a>
					</li>
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<a class="dropdown-item" href="<?= site_url('logout'); ?>">
							<i class="bx bx-power-off me-2"></i>
							<span class="align-middle">Log Out</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>