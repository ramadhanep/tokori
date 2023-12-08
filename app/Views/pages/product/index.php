<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Daftar Produk<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Daftar Produk</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header absolute">
                    <a href="<?= site_url('master/products/create') ?>" class="btn btn-primary rounded-pill"><span class="tf-icons bx bx-plus-circle"></span> Tambah Produk</a>
                    <a href="<?= site_url('master/products/print') ?>" target="_blank" class="btn btn-secondary rounded-pill"><span class="tf-icons bx bx-printer"></span> Cetak Barcode</a>
                </div>
                <div class="mt-4 card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="data-table table table-hover">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Kategori</th>
                                    <th>Barcode</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th width="150" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($products as $index => $item) : ?>
                                    <tr>
                                        <td>#<?= $item['id'] ?></td>
                                        <td>
                                            <span class="badge bg-label-primary"><small><?= $model->getCategory($item['product_category_id']); ?></small></span>
                                        </td>
                                        <td>
                                            <img src="<?= $item['barcode'] ?>" alt="<?= $item['name'] ?>" class="d-block object-fit-contain modal-basic-photo-show cursor-pointer" width="100">
                                            <small><?= $item['code'] ?></small>
                                        </td>
                                        <td class="d-flex align-items-center gap-2">
                                            <img src="/img/products/<?= $item['photo'] ? $item['photo'] : 'default.jpg' ?>" alt="<?= $item['name'] ?>" class="d-block rounded object-fit-cover modal-basic-photo-show cursor-pointer" height="50" width="50">
                                            <?= $item['name'] ?>
                                        </td>
                                        <td><?= rupiahFormat($item['price']) ?></td>
                                        <td><?= $item['quantity'] ?></td>

                                        <td class="text-center">
                                            <div class="d-flex gap-2">
                                                <a class="text-black" href="<?= site_url('master/products/edit/' . $item['id']) ?>" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Edit"><i class="bx bx-sm bx-edit"></i></a>
                                                <a class="text-black" href="<?= site_url('master/products/delete/' . $item['id']) ?>" onclick="return confirm('Anda yakin ingin menghapus product <?= $item['name'] ?>')" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Hapus"><i class="bx bx-sm bx-trash"></i></a>
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
<?php include 'partials/modal-photo.php'; ?>
<?php
if (session()->getFlashdata('success')) :
    echo showToast('bg-default', 'Informasi', session()->getFlashdata('success'));
endif;
?>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
$('.modal-basic-photo-show').click(function(e) {
    e.preventDefault()
    const id = $(this).data('id'),
        src = $(this).attr('src')
    $('#modal-basic-photo-title').text('Lihat Photo')
    $('#modal-basic-photo-img').attr('src', src)
    $('#modal-basic-photo').modal('show')
})

$('.data-table').DataTable({
    ordering: false,
    lengthChange: false,
    pageLength: 10
})
</script>
<?= $this->endSection() ?>