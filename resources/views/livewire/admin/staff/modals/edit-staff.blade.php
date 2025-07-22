<!-- Edit Staff Modal -->
<div class="modal fade" id="editStaffModal" tabindex="-1" role="dialog" aria-labelledby="editStaffLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Staff</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body row">
        <div class="form-group col-md-6">
          <label>Full Name</label>
          <input type="text" class="form-control" value="Kabiru Sani">
        </div>
        <div class="form-group col-md-6">
          <label>Email</label>
          <input type="email" class="form-control" value="kabiru@example.com">
        </div>
        <div class="form-group col-md-6">
          <label>Phone</label>
          <input type="text" class="form-control" value="08012345678">
        </div>
        <div class="form-group col-md-6">
          <label>Department</label>
          <select class="form-control">
            <option selected>Admin</option>
            <option>Finance</option>
            <option>Engineering</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Wallet Balance (₦)</label>
          <input type="number" class="form-control" value="150000">
        </div>
        <div class="form-group col-md-6">
          <label>Status</label>
          <select class="form-control">
            <option selected>Active</option>
            <option>Inactive</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Update Staff</button>
      </div>
    </form>
  </div>
</div>
