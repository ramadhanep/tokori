<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Supplier<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Supplier</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header absolute">
                    <button class="btn btn-primary rounded-pill" onclick="modalBasicFormCreate()"><span class="tf-icons bx bx-plus-circle"></span> Tambah Supplier</button>
                </div>
                <div class="mt-4 card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="data-table table table-striped">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th width="40" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($suppliers as $index => $item) : ?>
                                    <tr>
                                        <td>#<?= $item['id'] ?></td>
                                        <td><strong><?= $item['name'] ?></strong></td>
                                        <td><?= $item['email'] ?></td>
                                        <td><?= $item['phone'] ?></td>
                                        <td class="text-center">
                                            <div class="d-flex gap-2">
                                                <a class="text-black modal-basic-edit" href="javascript:void(0)" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-email="<?= $item['email'] ?>" data-phone="<?= $item['phone'] ?>" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Edit"><i class="bx bx-sm bx-edit"></i></a>
                                                <a class="text-black" href="<?= site_url('master/suppliers/delete/' . $item['id']) ?>" onclick="return confirm('Anda yakin ingin menghapus supplier <?= $item['name'] ?>')" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Hapus"><i class="bx bx-sm bx-trash"></i></a>
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
    $('#form-modal').attr('action', '/master/suppliers')
    $('#form-modal-input-name').val('')
    $('#form-modal-input-email').val('')
    $('#form-modal-input-phone').val('')
    $('#modal-basic-form-title').text('Tambah Supplier')
    $('#modal-basic-form').modal('show')
}

$('.modal-basic-edit').click(function(e) {
    e.preventDefault()
    const id = $(this).data('id'),
        name = $(this).data('name'),
        email = $(this).data('email'),
        phone = $(this).data('phone')
    $('#form-modal').attr('action', '/master/suppliers/update/' + id)
    $('#form-modal-input-name').val(name)
    $('#form-modal-input-email').val(email)
    $('#form-modal-input-phone').val(phone)
    $('#modal-basic-form-title').text('Edit Supplier')
    $('#modal-basic-form').modal('show')
})
$('.data-table').DataTable({
    ordering: false,
    lengthChange: false,
    pageLength: 10
})
</script>
<?= $this->endSection() ?>