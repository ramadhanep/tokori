<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Produk Terlaris<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Laporan /</span> Produk Terlaris</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="data-table table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori</th>
                                    <th>Code</th>
                                    <th>Produk</th>
                                    <th>Jumlah Terjual</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($reports as $index => $item) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $saleProductModel->getProductCategory($item['product_id'])['name'] ?></td>
                                        <td><?= $saleProductModel->getProduct($item['product_id'])['code'] ?></td>
                                        <td><?= $saleProductModel->getProduct($item['product_id'])['name'] ?></td>
                                        <td><?= $item['quantity'] ?> [<?= $saleProductModel->getProductUnit($item['product_id'])['name'] ?>]</td>
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
    var reportTitle = `Produk Terlaris`;
    $('.data-table').DataTable({
        ordering: false,
        lengthChange: true,
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [{
                extend: "print",
                text: '<i class="bx bxs-printer me-1" ></i>Print',
                className: "btn btn-outline-secondary mx-1 rounded-pill",
                title: reportTitle,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4],
                }
            },
            {
                extend: "pdf",
                text: '<i class="bx bxs-file-pdf me-1" ></i>PDF',
                className: "btn btn-outline-danger mx-1 rounded-pill",
                title: reportTitle,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4],
                }
            },
            {
                extend: "excel",
                text: '<i class="bx bx-table me-1" ></i>Excel',
                className: "btn btn-outline-success mx-1 rounded-pill",
                title: reportTitle,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4],
                }
            },
            {
                extend: "csv",
                text: '<i class="bx bxs-spreadsheet me-1" ></i>CSV',
                className: "btn btn-outline-success mx-1 rounded-pill",
                title: reportTitle,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4],
                }
            },
        ]
    })
</script>
<?= $this->endSection() ?>