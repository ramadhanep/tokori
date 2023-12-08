<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Daftar Produk<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Daftar Produk /</span> Edit</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<form action="<?= site_url('master/products/update/' . $data['id']) ?>" method="POST" enctype="multipart/form-data">
					<h5 class="card-header">Upload Foto</h5>
					<div class="card-body">
						<div class="d-flex align-items-start align-items-sm-center gap-4">
							<img src="/img/products/<?= $data['photo'] ? $data['photo'] : 'default.jpg' ?>" alt="user-avatar" class="d-block rounded object-fit-cover" height="100" width="100" id="form-photo-view" />
							<div class="button-wrapper">
								<input type="file" id="upload" class="form-control" accept="image/png, image/jpeg" name="form-photo" />
							</div>
						</div>
					</div>
					<hr class="my-0" />
					<div class="card-body">
						<div class="row">
							<div class="mb-3 col-md-3">
								<label for="form-product-category-id" class="form-label">Kategori <i class="text-danger">*</i></label>
								<select class="form-select" id="form-product-category-id" name="form-product-category-id" required>
									<option value="">&mdash;</option>
									<?php foreach ($productCategories as $item) : ?>
										<option value="<?= $item['id'] ?>" <?= $data['product_category_id'] == $item['id'] ? 'selected' : '' ?>><?= $item['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="mb-3 col-md-3">
								<label for="form-code" class="form-label">Kode <i class="text-danger">*</i></label>
								<input class="form-control" type="text" id="form-code" name="form-code" minlength="3" maxlength="255" value="<?= $data['code'] ?>" required autofocus />
							</div>
							<div class="mb-3 col-md-6">
								<label for="form-name" class="form-label">Nama Produk <i class="text-danger">*</i></label>
								<input class="form-control" type="text" id="form-name" name="form-name" minlength="3" maxlength="255" value="<?= $data['name'] ?>" required autofocus />
							</div>
							<div class="mb-3 col-md-3">
								<label for="form-name" class="form-label">Harga <i class="text-danger">*</i></label>
								<input class="form-control" type="text" id="form-name" name="form-price" required maxlength="11" value="<?= rupiahFormat($data['price']) ?>" autofocus oninput="formatCurrency(event)" />
							</div>
							<div class="mb-3 col-md-3">
								<label for="form-product-unit-id" class="form-label">Unit <i class="text-danger">*</i></label>
								<select class="form-select" id="form-product-unit-id" name="form-product-unit-id" required>
									<option value="">&mdash;</option>
									<?php foreach ($productUnits as $item) : ?>
										<option value="<?= $item['id'] ?>" <?= $data['product_unit_id'] == $item['id'] ? 'selected' : '' ?>><?= $item['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="mb-3 col-md-3">
								<label for="form-quantity" class="form-label">Stok <i class="text-danger">*</i></label>
								<input class="form-control" type="number" id="form-quantity" name="form-quantity" value="<?= $data['quantity'] ?>" required autofocus />
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
	var barcode = '';
	var interval;
	document.addEventListener('keydown', function(evt) {
		if (interval)
			clearInterval(interval);
		if (evt.code == 'Enter') {
			if (barcode)
				handleBarcode(barcode);
			barcode = '';
			return;
		}
		if (evt.key != 'Shift')
			barcode += evt.key;
		interval = setInterval(() => barcode = '', 20);
	});

	function handleBarcode(scanned_barcode) {
		document.querySelector('#form-code').val = scanned_barcode;
	}
</script>
<?= $this->endSection() ?>