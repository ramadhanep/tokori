<div class="modal fade" id="modal-basic-form" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form id="form-modal" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-basic-form-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="form-modal-name" class="form-label">Name <i class="text-danger">*</i></label>
            <input type="text" id="form-modal-input-name" class="form-control" name="name" required="true" minlength="3" maxlength="255" />
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>