<?= $this->extend("layouts/pos") ?>

<?= $this->section("title") ?>POS<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Aplikasi /</span> POS</h4>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-xl-8 mb-3 mb-xl-0">
					<h5>Keranjang Belanja</h5>
					<ul id="product-list" class="list-group mb-3"></ul>
					<div class="alert alert-secondary mb-3" role="alert">
						<div class="d-flex gap-3">
							<div class="flex-shrink-0 badge badge-center rounded bg-light p-3">
								<i class="bx bx-info-circle bx-sm text-secondary"></i>
							</div>
							<div class="flex-grow-1">
								<div class="fw-medium fs-5 mb-2">Petunjuk cara menambahkan produk</div>
								<ul class="list-number mb-0">
									<li>Kamu bisa menambahkan produk dengan mengscan barcode produk menggunakan barcode scanner</li>
									<li>Cara kedua kamu bisa menambah produk dengan klik teks tambah produk di bawah</li>
								</ul>
							</div>
						</div>
						<button type="button" class="btn-close btn-pinned" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<div class="list-group">
						<a href="javascript:void(0)" class="list-group-item d-flex justify-content-between" onclick="modalProductAdd()">
							<span>Tambah produk</span>
							<i class="bx bx-sm bx-chevron-right scaleX-n1-rtl"></i>
						</a>
					</div>
				</div>
				<div class="col-xl-4">
					<div class="border rounded p-4 mb-3 pb-3">
						<h6>Detail Harga</h6>
						<dl class="row mb-0">
							<dt class="col-6 fw-normal">Total Belanja</dt>
							<dd id="display-total" class="col-6 text-end">Rp0</dd>
							<dt class="col-6 fw-normal">PPN <?= $ppn ?>%</dt>
							<dd id="display-total-ppn" data-ppn="<?= $ppn ?>" class="col-6 text-end">Rp0</dd>
						</dl>
						<hr class="mx-n4">
						<dl class="row mb-0">
							<dt class="col-6">Total</dt>
							<dd id="display-total-plus-ppn" class="col-6 fw-medium text-end mb-0">Rp0</dd>
						</dl>
						<hr class="mx-n4">
						<dl class="row mb-0">
							<dt class="col-12 fw-normal">Nama Customer</dt>
							<dd class="mt-1 col-12 fw-semibold text-end mb-0">
								<input id="form-customer-name" type="text" class="form-control" name="form-customer-name" maxlength="255">
							</dd>
						</dl>
						<dl class="mt-2 row mb-0">
							<dt class="col-12 fw-normal">Metode Pembayaran <i class="text-danger">*</i></dt>
							<dd class="mt-1 col-12 fw-semibold text-left mb-0">
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
								<input class="form-control" type="text" id="form-payment-pay" name="form-payment-pay" required oninput="formatPay(event)" />
							</dd>
							<dd id="display-no-money" class="mt-1">
								<span class="text-danger">Uang kurang!</span>
							</dd>
						</dl>
						<dl class="mt-2 row mb-0">
							<dt class="col-12 fw-normal">Kembalian</dt>
							<dd id="display-payback" class="col-12 fw-bold mb-0"><b>Rp0</b></dd>
						</dl>
					</div>
					<div class="d-grid">
						<div id="submit-error" class="alert alert-danger" role="alert">
							Terjadi kesalahan pada server!
						</div>
						<button id="button-submit" class="btn btn-primary btn-next" disabled><span id="button-submit-loader" class="spinner-border me-1" role="status" aria-hidden="true"></span><span id="button-submit-text">Submit</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'partials/modal-product-add.php'; ?>
<?= $this->endSection() ?>

<?= $this->section("css") ?>
<link rel="stylesheet" href="/vendor/libs/selectra/selectra.min.css">
<link rel="stylesheet" href="/vendor/libs/sweetalert2/sweetalert2.css">
<style>
	.selectra-handler-icon {
		display: none;
	}

	.selectra-container,
	.selectra-handler-container {
		width: 100%;
	}

	.selectra-options {
		background-color: #ebeef0;
		overflow: hidden
	}

	.selectra-option {
		margin: 0;
		border-radius: 0;
	}
</style>
<?= $this->endSection() ?>
<?= $this->section("scripts") ?>
<script src="/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script src="/vendor/libs/selectra/selectra.min.js"></script>
<script>
	let productList = [];
	let totalSaleAmount = 0;
	let taxAmount = 0;
	let totalAmount = 0;
	let payAmount = 0;
	let payBackAmount = 0;

	// Selectra untuk metode pembayaran
	const selectCustomSearch = new Selectra('#form-payment-method', {
		search: true,
		langInputPlaceholder: 'Cari metode pembayaran',
		langEmptyValuePlaceholder: 'Metode pembayaran tidak ditemukan'
	})
	selectCustomSearch.init()

	// Open modal add product
	const modalProductAdd = () => {
		$('#form-modal').attr('action', '/master/product-categories')
		$('#form-modal-input-name').val('')

		const selectCustomSearch = new Selectra('#form-modal-input-product', {
			search: true,
			langInputPlaceholder: 'Cari produk',
			langEmptyValuePlaceholder: 'Produk tidak ditemukan'
		})
		selectCustomSearch.init()
		$('#modal-product-add').modal('show')
	}

	// Modal add product submit
	$("#form-modal").submit(function(event) {
		event.preventDefault();

		let selectedProductCode = $("#form-modal-input-product").val();
		let existingProduct = productList.find(product => product.code === selectedProductCode);

		if (existingProduct) {
			// If the product already exists, increment the quantity
			existingProduct.quantity += 1;
		} else {
			// If the product does not exist, add it with quantity 1
			let newProduct = {
				code: selectedProductCode,
				quantity: 1
			};
			productList.push(newProduct);
		}

		$("#modal-product-add").modal("hide");
		loadProductList();
	});

	// Load and display the list of products
	async function loadProductList() {
		let apiEndpoint = '/app/pos/ajax/products';
		let productCodes = productList.map(product => product.code);

		await $.ajax({
			url: apiEndpoint,
			method: 'GET',
			dataType: 'json',
			data: {
				'product-codes': productCodes
			},
			success: function(data) {
				$('#product-list').empty();
				if (data && data.length > 0) {
					// Loop through the product data and generate HTML for each product
					data.forEach(function(product) {
						let matchingProduct = productList.find(item => item.code === product.code);
						if (matchingProduct) {
							product.quantity = matchingProduct.quantity;
							matchingProduct.price = product.price;
						} else {
							product.quantity = 0;
						}
						let productHtml = `
							<li class="list-group-item p-4">
							<div class="d-flex gap-3">
								<div class="flex-shrink-0 d-flex align-items-start">
								<img src="/img/products/${product.photo ? product.photo : 'default.jpg'}" alt="${product.name}" class="w-px-100 d-block rounded object-fit-cover" height="100" width="100">
								</div>
								<div class="flex-grow-1">
								<div class="row">
									<div class="col-md-8">
									<h6 class="me-3">${product.name}</h6>
									<small><span class="me-1"><span class="badge bg-label-primary">${product.product_category_name}</span></small>
										<div class="mt-3 w-100p border rounded">
										<div class="d-flex justify-content-start align-items-center gap-1">
											<button type="button" class="btn-none text-primary p-1 btn-minus" data-product-code="${product.code}"><i class="bx bx-sm bx-minus"></i></button>
											<span class="w-5 text-center quantity">${product.quantity}</span>
											<button type="button" class="btn-none text-primary p-1 btn-plus" data-product-code="${product.code}"><i class="bx bx-sm bx-plus"></i></button>
										</div>
										</div>
									</div>
									<div class="col-md-4">
									<div class="text-md-end">
										<button type="button" class="btn-close btn-pinned" aria-label="Close"></button>
										<div class="my-2 my-md-4 mb-md-5">${product.quantity} x <span class="h6">${formatRupiah(product.price)}</span></div>
									</div>
									</div>
								</div>
								</div>
							</div>
							</li>`;

						$('#product-list').append(productHtml);
					});

					// Attach event handlers to the +/- buttons
					$('.btn-minus').on('click', function() {
						let productCode = $(this).data('product-code');
						updateProductQuantity(productCode, -1);
					});

					$('.btn-plus').on('click', function() {
						let productCode = $(this).data('product-code');
						updateProductQuantity(productCode, 1);
					});

					// Attach event handler to the btn-close buttons
					$('.btn-close').on('click', function() {
						let productCode = $(this).closest('li').find('.btn-minus').data('product-code');
						removeProduct(productCode);
					});
				}
			},
			error: function(error) {
				console.error('Error loading product list:', error);
			}
		});

		await updateTotalDisplay()
		await formatPayValidation()
	}

	// Function to update product quantity in the productList array
	function updateProductQuantity(productCode, change) {
		let productIndex = productList.findIndex(item => item.code == productCode);

		if (productIndex !== -1) {
			if (change == -1 && productList[productIndex].quantity > 1) {
				// If the product is found in productList, update its quantity
				productList[productIndex].quantity += change;
			} else if (change == 1) {
				// If the product is found in productList, update its quantity
				productList[productIndex].quantity += change;
			}

			// Update the UI
			loadProductList();
		}
	}

	// Function to remove a product from the productList array
	function removeProduct(productCode) {
		let productIndex = productList.findIndex(item => item.code == productCode);

		if (productIndex !== -1) {
			// If the product is found in productList, remove it
			productList.splice(productIndex, 1);
			// Update the UI
			loadProductList();
		}
	}

	// Function to update the total display based on product quantities and prices
	function updateTotalDisplay() {
		let total = 0;

		productList.forEach(function(product) {
			total += product.quantity * product.price;
		});

		// Display the total in Indonesian Rupiah format
		$('#display-total').text(formatRupiah(total));
		const totalPpn = total * ($('#display-total-ppn').data('ppn') / 100)
		$('#display-total-ppn').text(formatRupiah(totalPpn))
		const totalPlusPpn = total + totalPpn
		$('#display-total-plus-ppn').text(formatRupiah(totalPlusPpn))

		totalSaleAmount = total;
		taxAmount = totalPpn;
		totalAmount = totalPlusPpn;
	}

	// Function to format price in Indonesian Rupiah format
	function formatRupiah(price) {
		return new Intl.NumberFormat('id-ID', {
			style: 'currency',
			currency: 'IDR',
			minimumFractionDigits: 0,
			maximumFractionDigits: 0
		}).format(price);
	}

	// Function to format form pay
	function formatPay(event) {
		const input = event.target.value;
		const cleanedPrice = input.replace(/Rp|\.|,/g, '');
		const formattedValue = 'Rp' + formatNumber(cleanedPrice);
		event.target.value = formattedValue;
		formatPayValidation()
	}
	$('#display-no-money').hide()
	function formatPayValidation() {
		const cleanedPrice = $('#form-payment-pay').val().replace(/Rp|\.|,/g, '');
		const integerValue = parseInt(cleanedPrice, 10);
		
		const payBack = integerValue - totalAmount;
		payAmount = integerValue
		payBackAmount = payBack
		if (payBack > 0) {
			$('#display-no-money').hide()
			$('#display-payback').text('Rp' + formatNumber(payBack));
			$('#button-submit').attr('disabled', false)
		}
		else {
			if (integerValue) {
				$('#display-no-money').show()
			}
			$('#display-payback').text('Rp0');
			$('#button-submit').attr('disabled', true)
		}
	}

	// Barcode listener
	let barcode = '';
	let interval;
	document.addEventListener('keydown', function(event) {
		if (interval) clearInterval(interval);
		if (event.code == 'Enter') {
			if (barcode) handleBarcode(barcode);
			barcode = '';
			event.preventDefault(); // Prevent form submission
			return;
		}
		if (event.key != 'Shift') barcode += event.key;
		interval = setInterval(() => barcode = '', 20);
	});
	function handleBarcode(scannedBarcode) {
		let existingProduct = productList.find(product => product.code == scannedBarcode);

		if (existingProduct) {
			// If the product already exists, increment the quantity
			existingProduct.quantity += 1;
			loadProductList();
		} else {
			// If the product does not exist, add it with quantity 1
			let apiEndpoint = '/app/pos/ajax/product-check';
			$.ajax({
				url: apiEndpoint,
				method: 'GET',
				dataType: 'json',
				data: {
					'product-code': scannedBarcode
				},
				success: function(data) {
					if (data.status) {
						let newProduct = {
							code: scannedBarcode,
							quantity: 1
						};
						productList.push(newProduct);
						loadProductList();
					}
				}
			});
		}
	}

	// Submit button action
	const buttonSubmit = $('#button-submit');
	const buttonSubmitText = $('#button-submit-text');
	const buttonSubmitLoader = $('#button-submit-loader');
	const submitError = $('#submit-error')
	buttonSubmitLoader.hide()
	submitError.hide()
	buttonSubmit.click(async function(event) {
		event.preventDefault()
		buttonSubmitLoader.show()
		buttonSubmitText.text('')
		let apiEndpoint = '/app/pos/ajax/transaction';
		$.ajax({
			url: apiEndpoint,
			method: 'POST',
			dataType: 'json',
			data: {
				'payment_method_id': $('#form-payment-method').val(),
				'customer_name': $('#form-customer-name').val(),
				'total_sale_amount': totalSaleAmount,
				'tax_amount': taxAmount,
				'total_amount': totalAmount,
				'pay_amount': payAmount,
				'payback_amount': payBackAmount,
				'product_lists': productList,
			},
			success: function(data) {
				buttonSubmitLoader.hide();
				submitError.hide();
				buttonSubmitText.text('Submit');
				buttonSubmit.attr('disabled', true)
				Swal.fire({
					title: "Transaksi Berhasil!",
					text: "Terima kasih! Transaksi penjualan telah berhasil dicatat.",
					icon: "success",
					customClass: { confirmButton: "btn btn-primary" },
					buttonsStyling: false,
					allowOutsideClick: false,
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = `/app/pos/${data.sale}`;
					}
				});
			},
			error: function(error) {
				console.error('Error submit transaction:', error);
				buttonSubmitLoader.hide()
				submitError.show();
			}
		})
	})
</script>
<?= $this->endSection() ?>