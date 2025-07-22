<!-- View Staff Modal -->
<div class="modal fade" id="viewStaffModal" tabindex="-1" role="dialog" aria-labelledby="viewStaffLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content border-0 shadow">
      <div class="modal-header text-white">
        <h5 class="modal-title" id="viewStaffLabel"><i class="fa fa-user-circle mr-2"></i> Staff Profile</h5>
        <button type="button" class="close text-danger" data-dismiss="modal"><span>&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="text-center mb-3">
          <img src="{{ asset('admin/vendors/images/team.png') }}" alt="Staff Avatar" class="rounded-circle" width="100" height="100">
          <h5 class="mt-2 mb-0">Kabiru Sani</h5>
          <small class="text-muted">Application ID: APP-00123</small>
        </div>

        <hr>

        <div class="row text-sm">
          <div class="col-6 mb-2"><strong>Email:</strong> <br> kabiru@example.com</div>
          <div class="col-6 mb-2"><strong>Phone:</strong> <br> 08012345678</div>
          <div class="col-6 mb-2"><strong>Department:</strong> <br> Admin</div>
          <div class="col-6 mb-2"><strong>Status:</strong> <br> <span class="badge badge-success">Active</span></div>
          <div class="col-12 mt-2"><strong>Wallet Balance:</strong> <br> <span class="text-primary font-weight-bold">₦150,000</span></div>
        </div>
      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fa fa-envelope"></i> Contact</button>
      </div>
    </div>
  </div>
</div>
