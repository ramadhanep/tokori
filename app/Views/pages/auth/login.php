<?= $this->extend("layouts/blank") ?>

<?= $this->section("title") ?>Login<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <img src="/logo.png" alt="Tokori" class="w-brand">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2 text-primary">Tokori.</span>
                    </div>
                    <p class="mb-4">Silahkan login untuk melanjutkan</p>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger"><i class='bx bx-info-circle'></i> <?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <form class="mb-3" action="<?= site_url('login'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>