<?= $this->extend("layouts/blank") ?>

<?= $this->section("title") ?>Detail POS<?= $this->endSection() ?>

<?= $this->section("content") ?>
<?php
$setting = new App\Models\Setting();
$setting = $setting->first();

$profile = new App\Models\User();
$profile = $profile->find(session()->get('SES_AUTH_USER_ID'));
?>
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row invoice-preview justify-content-center">
		<div class="col-xl-8 col-md-8 col-12 mb-md-0 mb-4">
			<div class="invoice-preview-card">
				<div class="card-body">
					<div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
						<div class="mb-xl-0">
							<div class="d-flex align-items-center gap-2">
								<span class="app-brand-logo demo">
									<?php if (!empty($setting['company_logo'])): ?>
										<img src="<?= $setting['company_logo'] ? "/img/companies/".$setting['company_logo'] : '/logo.png' ?>" alt="user-avatar" class="d-block rounded object-fit-cover" height="28" width="28" id="form-company-logo-view" />
									<?php endif; ?>
								</span>
								<span><?= $setting['company_name'] ?></span>
							</div>
						</div>
						<div class="text-end">
							<h4 class="mb-0 text-uppercase">#<?= $sale['id'] ?></h4>
							<span><?= date('d/m/Y H:i:s', strtotime($sale['created_at'])) ?></span>
						</div>
					</div>
				</div>
				<hr class="my-0">
				<div class="card-body">
					<div class="row p-sm-1 p-0">
						<div class="col-xl-4 col-md-12 col-sm-5 col-12">
							<h6 class="pb-2">Nama Pelanggan:</h6>
							<p class="mb-1"><?= $sale['customer_name'] ? $sale['customer_name'] : 'Anonim' ?></p>
						</div>
						<div class="col-xl-4 col-md-12 col-sm-5 col-12">
							<h6 class="pb-2">Metode Pembayaran:</h6>
							<p class="mb-1"><?= $model->getPaymentMethod($sale['payment_method_id']) ?></p>
						</div>
					</div>
				</div>
				<table class="table border-top m-0">
					<thead>
						<tr>
							<th>Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($model->getSaleProducts($sale['id']) as $index => $item) : ?>
						<tr>
							<td class="text-nowrap"><?= $modelSaleProduct->getProduct($item['product_id'])['name'] ?></td>
							<td><?= rupiahFormat($modelSaleProduct->getProduct($item['product_id'])['price']) ?></td>
							<td><?= $item['quantity'] ?></td>
							<td><?= rupiahFormat($item['quantity']*$modelSaleProduct->getProduct($item['product_id'])['price']) ?></td>
						</tr>
						<?php endforeach; ?>
						<tr>
							<td class="align-top px-4 py-5">
								<p class="mb-2">
									<span class="me-1 fw-medium">Kasir:</span>
									<span><?= $profile['name'] ?></span>
								</p>
							</td>
							<td class="py-5">
								<div class="d-flex justify-content-end gap-2">
									<div class="text-end">
										<p class="mb-2">Bayar:</p>
										<p class="mb-2">Kembali:</p>
									</div>
									<div>
										<p class="fw-medium mb-2"><?= rupiahFormat($sale['pay_amount']) ?></p>
										<p class="fw-medium mb-0"><?= rupiahFormat($sale['payback_amount']) ?></p>
									</div>
								</div>
							</td>
							<td colspan="2" class="py-5">
								<div class="d-flex justify-content-end gap-2">
									<div class="text-end">
										<p class="mb-2">Total Belanja:</p>
										<p class="mb-2">Pajak:</p>
										<p class="mb-0">Total:</p>
									</div>
									<div>
										<p class="fw-medium mb-2"><?= rupiahFormat($sale['total_sale_amount']) ?></p>
										<p class="fw-medium mb-2"><?= rupiahFormat($sale['tax_amount']) ?></p>
										<p class="fw-medium mb-0"><?= rupiahFormat($sale['total_amount']) ?></p>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<span>Terima kasih atas pembelian Anda, semoga produk atau layanan yang Anda pilih dapat memenuhi kebutuhan dengan baik.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section("css") ?>
<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<script>
    window.onafterprint = function() {
        window.close();
    };
    window.print();
</script>
<?= $this->endSection() ?>