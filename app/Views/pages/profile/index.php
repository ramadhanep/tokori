<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Profile<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Akun</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<form action="<?= site_url('/profile') ?>" method="POST" enctype="multipart/form-data">
					<h5 class="card-header">Profile Details</h5>
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
							<img src="/img/avatars/<?= $profile['photo'] ? $profile['photo'] : 'default.jpg' ?>" alt="user-avatar" class="d-block rounded object-fit-cover" height="100" width="100" id="form-photo-view" />
              <div class="button-wrapper">
                <input type="file" id="upload" class="form-control" accept="image/png, image/jpeg" name="form-photo" />
              </div>
            </div>
          </div>
					<hr class="my-0" />
					<div class="card-body">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="form-name" class="form-label">Nama Lengkap <i class="text-danger">*</i></label>
								<input class="form-control" type="text" id="form-name" name="form-name" value="<?= $profile['name'] ?>" autofocus />
							</div>
							<div class="mb-3 col-md-6">
								<label for="form-email" class="form-label">E-mail</label>
								<input class="form-control" type="text" id="form-email" value="<?= $profile['email'] ?>" disabled />
							</div>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Save changes</button>
						</div>
					</div>
				</form>
			</div>
			<div class="card">
				<h5 class="card-header">Ganti Password</h5>
				<div class="card-body">
				<form action="<?= site_url('/profile/change-password') ?>" method="POST">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label for="form-password" class="form-label">Password Lama <i class="text-danger">*</i></label>
								<input class="form-control" type="password" id="form-password" name="form-old-password" autofocus minlength="3" required />
							</div>
							<div class="mb-3 col-md-6"></div>
							<div class="mb-3 col-md-6">
								<label for="form-password" class="form-label">Password Baru <i class="text-danger">*</i></label>
								<input class="form-control" type="password" id="form-password" name="form-new-password" autofocus minlength="3" required />
							</div>
							<div class="mb-3 col-md-6">
								<label for="form-password-confirm" class="form-label">Konfirmasi Password Baru <i class="text-danger">*</i></label>
								<input class="form-control" type="password" id="form-password-confirm" name="form-new-password-confirm" autofocus minlength="3" required />
							</div>
						</div>
						<div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" name="form-check" id="form-check" />
							<label class="form-check-label" for="form-check">Konfirmasi untuk mengganti password akun</label>
						</div>
						<button type="submit" class="btn btn-primary me-2">Save changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if (session()->getFlashdata('success')) :
	echo showToast('bg-default', 'Informasi', session()->getFlashdata('success'));
elseif (session()->getFlashdata('error')) :
	echo showToast('bg-danger', 'Informasi', session()->getFlashdata('error'));
endif;
?>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
</script>
<?= $this->endSection() ?>