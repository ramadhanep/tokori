<div class="modal fade" id="modal-product-add" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form id="form-modal" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-product-add-title">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="form-modal-name" class="form-label">Nama Produk <i class="text-danger">*</i></label>
            <select class="form-select" id="form-modal-input-product" name="form-modal-input-product" required>
              <?php foreach ($products as $item) : ?>
                <option value="<?= $item['code'] ?>"><?= $item['code'] ?> &mdash; <?= $item['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>