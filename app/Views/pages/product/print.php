<?= $this->extend("layouts/blank") ?>

<?= $this->section("title") ?>Daftar Produk<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <?php foreach ($products as $index => $item) : ?>
        <div class="col-3">
            <img src="<?= $item['barcode'] ?>" alt="<?= $item['name'] ?>" class="d-block object-fit-contain modal-basic-photo-show cursor-pointer" width="100">
            <small><?= $item['code'] ?></small>
            <p><small><?= $item['name'] ?></small></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
    window.onafterprint = function() {
        window.close();
    };
    window.print();
</script>
<?= $this->endSection() ?>