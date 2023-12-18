<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Penjualan Harian<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Laporan /</span> Penjualan Harian</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="">
                        <div class="row align-items-center">
                            <div class="mb-3 col-md-6">
                                <label for="form-name" class="form-label">Tanggal Periode</label>
                                <div class="d-flex gap-4">
                                    <input class="form-control" type="date" name="filter-start-date" id="filter-start-date">
                                    <input class="form-control" type="date" name="filter-end-date" id="filter-end-date">
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="mt-3 btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="data-table table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Penjualan</th>
                                    <th>Pajak</th>
                                    <th>Total Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($reports as $index => $item) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $item['date'] ?></td>
                                        <td><?= rupiahFormat($item['total_sale']) ?></td>
                                        <td><?= rupiahFormat($item['total_tax']) ?></td>
                                        <td><?= rupiahFormat($item['grand_total']) ?></td>
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
    // Function to get URL parameters
    function getUrlParameter(name) {
        name = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    // Set start date to the first day of the current month or from the query string
    var startDate = new Date();
    var queryStartDate = getUrlParameter('filter-start-date');
    if (queryStartDate) {
        startDate = new Date(queryStartDate);
    } else {
        startDate.setDate(1);
    }
    var formattedStartDate = startDate.toISOString().slice(0, 10);
    $('#filter-start-date').val(formattedStartDate);

    // Set end date to the last day of the current month or from the query string
    var endDate = new Date();
    var queryEndDate = getUrlParameter('filter-end-date');
    if (queryEndDate) {
        endDate = new Date(queryEndDate);
    } else {
        endDate.setMonth(endDate.getMonth() + 1);
        endDate.setDate(0);
    }
    var formattedEndDate = endDate.toISOString().slice(0, 10);
    $('#filter-end-date').val(formattedEndDate);

    // Datatable
    var reportTitle = `Laporan Harian (${formattedStartDate} - ${formattedEndDate})`;
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