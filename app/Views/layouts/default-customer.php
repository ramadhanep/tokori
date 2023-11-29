<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title><?= $this->renderSection('title') ?></title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="/css/demo.css" />
  <link rel="stylesheet" href="/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <?= $this->renderSection('css') ?>
  <script src="/vendor/js/helpers.js"></script>
  <script src="/js/config.js"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include 'partials/navbar-customer.php'; ?>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <?= $this->renderSection('content') ?>
          <!-- / Content -->
          <!-- Footer -->
          <?php include 'partials/footer.php'; ?>
          <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <script src="/vendor/libs/jquery/jquery.js"></script>
  <script src="/vendor/libs/popper/popper.js"></script>
  <script src="/vendor/js/bootstrap.js"></script>
  <script src="/vendor/js/menu.js"></script>
  <script src="/js/main.js"></script>
  <?= $this->renderSection('scripts') ?>
</body>

</html>