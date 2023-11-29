<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Unit Produk<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Unit Produk</h4>
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header absolute">
                    <button class="btn btn-primary rounded-pill" onclick="modalBasicFormCreate()"><span class="tf-icons bx bx-plus-circle"></span> Tambah Unit</button>
                </div>
                <div class="mt-4 card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="data-table table table-striped">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Unit Produk</th>
                                    <th width="40" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($productUnits as $index => $item) : ?>
                                    <tr>
                                        <td>#<?= $item['id'] ?></td>
                                        <td><strong><?= $item['name'] ?></strong></td>
                                        <td class="text-center">
                                            <div class="d-flex gap-2">
                                                <a class="text-black modal-basic-edit" href="javascript:void(0)" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Edit"><i class="bx bx-sm bx-edit"></i></a>
                                                <a class="text-black" href="<?= site_url('master/product-units/delete/' . $item['id']) ?>" onclick="return confirm('Anda yakin ingin menghapus kategori <?= $item['name'] ?>')" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Hapus"><i class="bx bx-sm bx-trash"></i></a>
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
<?php include 'partials/modal-form.php'; ?>
<?php
if (session()->getFlashdata('success')) :
    echo showToast('bg-default', 'Informasi', session()->getFlashdata('success'));
endif;
?>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
const modalBasicFormCreate = () => {
    $('#form-modal').attr('action', '/master/product-units')
    $('#form-modal-input-name').val('')
    $('#modal-basic-form-title').text('Tambah Unit')
    $('#modal-basic-form').modal('show')
}

$('.modal-basic-edit').click(function(e) {
    e.preventDefault()
    const id = $(this).data('id'),
        name = $(this).data('name')
    $('#form-modal').attr('action', '/master/product-units/update/' + id)
    $('#form-modal-input-name').val(name)
    $('#modal-basic-form-title').text('Edit Unit')
    $('#modal-basic-form').modal('show')
})
$('.data-table').DataTable({
    ordering: false,
    lengthChange: false,
    pageLength: 5
})
</script>
<?= $this->endSection() ?>