<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Pengguna<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Akun /</span> Pengguna</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header absolute">
                    <a href="<?= site_url('users/create') ?>" class="btn btn-primary rounded-pill"><span class="tf-icons bx bx-plus-circle"></span> Tambah Pengguna</a>
                </div>
                <div class="mt-4 card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="data-table table table-hover">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Role</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th width="150" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($users as $index => $item) : ?>
                                    <tr>
                                        <td class="text-uppercase">#<?= $item['id'] ?></td>
                                        <td>
                                            <span class="badge bg-label-primary"><small><?= $item['role'] ?></small></span>
                                        </td>
                                        <td class="d-flex align-items-center gap-2">
                                            <img src="/img/avatars/<?= $item['photo'] ? $item['photo'] : 'default.jpg' ?>" alt="<?= $item['name'] ?>" class="d-block rounded object-fit-cover modal-basic-photo-show cursor-pointer" height="50" width="50" rounded">
                                            <?= $item['name'] ?>
                                        </td>
                                        <td><?= $item['email'] ?></td>
                                        <td>
                                            <?php if ($item['is_active'] == 1) : ?>
                                                <span class="badge bg-success"><small>Aktif</small></span>
                                            <?php else : ?>
                                                <span class="badge bg-secondary"><small>Tidak Aktif</small></span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <div class="d-flex gap-2">
                                                <a class="text-black modal-basic-update-password" href="javascript:void(0)" data-id="<?= $item['id'] ?>" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Paksa Ubah Password"><i class="bx bx-sm bx-lock"></i></a>
                                                <a class="text-black" href="<?= site_url('users/edit/' . $item['id']) ?>" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Edit"><i class="bx bx-sm bx-edit"></i></a>
                                                <a class="text-black" href="<?= site_url('users/delete/' . $item['id']) ?>" onclick="return confirm('Anda yakin ingin menghapus user <?= $item['name'] ?>')" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Hapus"><i class="bx bx-sm bx-trash"></i></a>
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
<?php include 'partials/modal-photo.php'; ?>
<?php
if (session()->getFlashdata('success')) :
    echo showToast('bg-default', 'Informasi', session()->getFlashdata('success'));
endif;
?>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
$('.modal-basic-update-password').click(function(e) {
    e.preventDefault()
    const id = $(this).data('id')
    $('#form-modal').attr('action', '/users/update-password/' + id)
    $('#modal-basic-form-title').text('Paksa Ubah Password')
    $('#modal-basic-form').modal('show')
})

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
    pageLength: 5
})
</script>
<?= $this->endSection() ?>