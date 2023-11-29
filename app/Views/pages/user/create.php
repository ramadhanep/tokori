<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Pengguna<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Akun / Pengguna /</span> Create</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <form action="<?= site_url('users/create') ?>" method="POST" enctype="multipart/form-data">
          <h5 class="card-header">Upload Foto</h5>
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <div class="button-wrapper">
                <input type="file" id="upload" class="form-control" accept="image/png, image/jpeg" name="form-photo" />
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <div class="row">
              <div class="mb-3 col-md-3">
                <label for="form-name" class="form-label">Role <i class="text-danger">*</i></label>
                <select class="form-select" id="form-name" name="form-role" required>
                  <?php $roles = ['Kasir', 'Manajer']; ?>
                  <?php foreach ($roles as $item) : ?>
                    <option value="<?= $item ?>"><?= $item ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3 col-md-5">
                <label for="form-name" class="form-label">Nama <i class="text-danger">*</i></label>
                <input class="form-control" type="text" id="form-name" name="form-name" minlength="3" maxlength="255" required autofocus />
              </div>
              <div class="mb-3 col-md-4">
                <label for="form-email" class="form-label">Email <i class="text-danger">*</i></label>
                <input class="form-control" type="email" id="form-email" name="form-email" minlength="3" maxlength="255" required autofocus />
              </div>
              <div class="mb-3 col-md-3">
								<label for="form-password" class="form-label">Password <i class="text-danger">*</i></label>
								<input class="form-control" type="password" id="form-password" name="form-password" autofocus minlength="3" required />
							</div>
							<div class="mb-3 col-md-3">
								<label for="form-password-confirm" class="form-label">Konfirmasi Password <i class="text-danger">*</i></label>
								<input class="form-control" type="password" id="form-password-confirm" name="form-password-confirm" autofocus minlength="3" required />
							</div>
              <div class="mb-3 col-md-3">
                <label for="form-status" class="form-label">Status <i class="text-danger">*</i></label>
                <select class="form-select" id="form-status" name="form-status" required>
                  <?php $statuses = [
                    [
                      "id" => 1,
                      "name" => "Aktif"
                    ],
                    [
                      "id" => 0,
                      "name" => "Tidak Aktif"
                    ],
                  ]; ?>
                  <?php foreach ($statuses as $item) : ?>
                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Submit</button>
            </div>
          </div>
        </form>
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