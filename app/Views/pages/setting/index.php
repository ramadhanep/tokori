<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Profile<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> General</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<form action="<?= site_url('/settings') ?>" method="POST" enctype="multipart/form-data">
					<h5 class="card-header">General Information</h5>
					<div class="card-body">
						<div class="d-flex align-items-start align-items-sm-center gap-4">
							<img src="<?= $setting['company_logo'] ? "/img/companies/".$setting['company_logo'] : '/logo.png' ?>" alt="user-avatar" class="d-block rounded object-fit-cover" height="100" width="100" id="form-company-logo-view" />
							<div class="button-wrapper">
								<label for="form-name" class="form-label">Ubah Logo</label>
								<input type="file" id="upload" class="form-control" accept="image/png, image/jpeg" name="form-company-logo" />
							</div>
						</div>
					</div>
					<hr class="my-0" />
					<div class="card-body">
						<div class="row">
							<div class="mb-3 col-md-10">
								<label for="form-company-name" class="form-label">Nama Perusahaan <i class="text-danger">*</i></label>
								<input class="form-control" type="text" id="form-company-name" name="form-company-name" value="<?= $setting['company_name'] ?>" autofocus />
							</div>
							<div class="mb-3 col-md-2">
								<label for="form-name" class="form-label">PPN (Pajak Transaksi)<i class="text-danger">*</i></label>
								<input class="form-control" type="text" id="form-sales-tax" name="form-sales-tax" value="<?= $setting['sales_tax'] ?>" autofocus />
							</div>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Save changes</button>
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