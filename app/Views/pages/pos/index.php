<?= $this->extend("layouts/pos") ?>

<?= $this->section("title") ?>POS<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> POS</h4>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-xl-8 mb-3 mb-xl-0">
					<h5>Keranjang Belanja</h5>
					<ul class="list-group mb-3">
						<li class="list-group-item p-4">
							<div class="d-flex gap-3">
								<div class="flex-shrink-0 d-flex align-items-start">
									<img src="https://assets.klikindomaret.com/share/20076573_1.jpg" alt="google home" class="w-px-100">
								</div>
								<div class="flex-grow-1">
									<div class="row">
										<div class="col-md-8">
											<h6 class="me-3">Nextar 120mg</h6>
											<span class="me-1"><span class="badge bg-label-primary">MAKANAN RINGAN</span>
											<div class="mt-3 w-100p border rounded">
												<div class="d-flex justify-content-start align-items-center gap-1">
													<button type="submit" class="btn-none text-primary p-1"><i class="bx bx-sm bx-minus"></i></button>
													</form>
													<span class="w-5 text-center">2</span>
													<button type="submit" class="btn-none text-primary p-1"><i class="bx bx-sm bx-plus"></i></button>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="text-md-end">
												<button type="button" class="btn-close btn-pinned" aria-label="Close"></button>
												<div class="my-2 my-md-4 mb-md-5">10 x <span class="h6">Rp15.000</span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<div class="list-group">
						<a href="javascript:void(0)" class="list-group-item d-flex justify-content-between">
							<span>Tambah produk lainnya</span>
							<i class="bx bx-sm bx-chevron-right scaleX-n1-rtl"></i>
						</a>
					</div>
				</div>
				<div class="col-xl-4">
					<div class="border rounded p-4 mb-3 pb-3">
						<h6>Detail Harga</h6>
						<dl class="row mb-0">
							<dt class="col-6 fw-normal">Total Belanja</dt>
							<dd class="col-6 text-end">Rp15.000.000</dd>
							<dt class="col-6 fw-normal">PPN 11%</dt>
							<dd class="col-6 text-end">Rp150.000</dd>
						</dl>
						<hr class="mx-n4">
						<dl class="row mb-0">
							<dt class="col-6">Total</dt>
							<dd class="col-6 fw-medium text-end mb-0">Rp150.000</dd>
						</dl>
						<hr class="mx-n4">
						<dl class="row mb-0">
							<dt class="col-12 fw-normal">Nama Customer</dt>
							<dd class="mt-1 col-12 fw-semibold text-end mb-0">
								<input type="text" class="form-control" name="form-customer-name" maxlength="255">
							</dd>
						</dl>
						<dl class="mt-2 row mb-0">
							<dt class="col-12 fw-normal">Metode Pembayaran <i class="text-danger">*</i></dt>
							<dd class="mt-1 col-12 fw-semibold text-end mb-0">
								<select class="form-select" id="form-payment-method" name="form-payment-method" required>
									<?php foreach ($paymentMethods as $item) : ?>
										<option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</dd>
						</dl>
						<dl class="mt-2 row mb-0">
							<dt class="col-12 fw-normal">Bayar <i class="text-danger">*</i></dt>
							<dd class="mt-1 col-12 fw-semibold text-end mb-0">
								<input class="form-control" type="text" id="form-payment-pay" name="form-payment-pay" required maxlength="11" autofocus oninput="formatCurrency(event)" />
							</dd>
						</dl>
						<dl class="mt-2 row mb-0">
							<dt class="col-12 fw-normal">Kembalian</dt>
							<dd class="col-12 fw-medium mb-0"><b>Rp0</b></dd>
						</dl>
					</div>
					<div class="d-grid">
						<button class="btn btn-primary btn-next">Submit</button>
					</div>
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