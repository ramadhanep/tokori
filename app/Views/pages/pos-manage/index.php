<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Point of Sale<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Aplikasi /</span> Point of Sale</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="data-table table table-hover">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Total Belanja</th>
                                    <th>Pajak</th>
                                    <th>Total</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($sales as $index => $item) : ?>
                                    <tr>
                                        <td>#<?= $item['id'] ?></td>
                                        <td><?= $item['customer_name'] ?></td>
                                        <td><?= $model->getPaymentMethod($item['payment_method_id']) ?></td>
                                        <td><?= rupiahFormat($item['total_sale_amount']) ?></td>
                                        <td><?= rupiahFormat($item['tax_amount']) ?></td>
                                        <td><?= rupiahFormat($item['total_amount']) ?></td>
                                        <td class="text-center">
                                            <div class="d-flex gap-2">
                                                <a class="text-primary" href="<?= site_url('point-of-sales/' . $item['id']) ?>" title="Detail"><i class="bx bx-sm bx-detail"></i> Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (session()->getFlashdata('success')) :
    echo showToast('bg-default', 'Informasi', session()->getFlashdata('success'));
endif;
?>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
$('.data-table').DataTable({
    ordering: false,
    lengthChange: true,
    pageLength: 10
})
</script>
<?= $this->endSection() ?>