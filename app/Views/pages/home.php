<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Dashboard<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12 col-md-3">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="/img/icons/unicons/wallet.png" alt="transaksi" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block mt-3 mb-2">Jumlah Transaksi</span>
          <h3 class="card-title mb-3"><?= 1000 ?></h3>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="/img/icons/unicons/paypal.png" alt="transaksi" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block mt-3 mb-2">Valuasi Transaksi Selesai</span>
          <h3 class="card-title mb-3"><?= rupiahFormatDashboard(100000) ?></h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-8 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-9">
            <div class="card-body">
              <h5 class="card-title text-primary"><?= $greeting ?> <?= $profile["name"] ?> 👋</h5>
              <p class="mb-4">Selamat bekerja dengan penuh semangat.</p>
              <a href="<?= site_url('profile') ?>" class="btn btn-sm btn-label-primary">Lihat Profile</a>
            </div>
          </div>
          <div class="col-sm-3 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("css") ?>
<link rel="stylesheet" href="/vendor/libs/apex-charts/apex-charts.css" />
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
</script>
<?= $this->endSection() ?>