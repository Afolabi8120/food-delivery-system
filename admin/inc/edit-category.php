<div class="modal" tabindex="-1" role="dialog" id="editCategory<?= $fetchCategory->cat_id; ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <form method="POST">
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" name="cat_id" value="<?= $fetchCategory->cat_id; ?>" readonly>
                <input type="text" class="form-control" name="name" placeholder="e.g. Beverages">
              </div>
              <input type="submit" class="btn btn-primary" name="btnAddCategory" value="Create">
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

