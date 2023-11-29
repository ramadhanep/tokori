<?php
if (!function_exists('is_root_path')) {
  function is_root_path()
  {
    $uri = service('uri');
    $currentURL = $uri->getPath();
    if ($currentURL == "/") {
      return 'active';
    }
  }
}
if (!function_exists('is_active_menu')) {
  function is_active_menu($urlSegment)
  {
    $uri = service('uri');
    $currentURL = $uri->getPath();
    return (strpos($currentURL, $urlSegment) !== false) ? 'active open' : '';
  }
}
$profile = new App\Models\User();
$profile = $profile->find(session()->get('SES_AUTH_USER_ID'));
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?= site_url('/') ?>" class="app-brand-link">
      <img src="/logo.png" alt="Tokori" class="w-brand">
      <span class="app-brand-text demo menu-text fw-bolder ms-2 text-primary">Tokori.</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <li class="menu-item <?= is_root_path(); ?>">
      <a href="<?= site_url('/'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <?php if ($profile['role'] == 'Manajer') : ?>
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Manajemen</span></li>
      <li class="menu-item <?= is_active_menu('master/payment-methods'); ?>">
        <a href="<?= site_url('master/payment-methods'); ?>" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-bank"></i>
          <div data-i18n="Without menu">Metode Pembayaran</div>
        </a>
      </li>
      <li class="menu-item <?= is_active_menu('master/products'); ?> <?= is_active_menu('master/product-categories'); ?>">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-copy"></i>
          <div data-i18n="Extended UI">Produk</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item <?= is_active_menu('master/products'); ?>">
            <a href="<?= site_url('master/products'); ?>" class="menu-link">
              <div data-i18n="Perfect Scrollbar">Daftar Produk</div>
            </a>
          </li>
          <li class="menu-item <?= is_active_menu('master/product-categories'); ?>">
            <a href="<?= site_url('master/product-categories'); ?>" class="menu-link">
              <div data-i18n="Text Divider">Kategori</div>
            </a>
          </li>
        </ul>
      </li>
    <?php endif; ?>
    <?php if ($profile['role'] == 'Manajer') : ?>
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Akun</span></li>
      <li class="menu-item <?= is_active_menu('users'); ?>">
        <a href="<?= site_url('users'); ?>" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-user-account"></i>
          <div data-i18n="Boxicons">Pengguna</div>
        </a>
      </li>
    <?php endif; ?>
  </ul>
</aside>