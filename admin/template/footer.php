<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    &copy; Rawana Hotel <script>
                    document.write(new Date().getFullYear())
                    </script>. All Right Reserved. <br>
                    Designed By : M.F.A. SHAHANI | SEU.IS.18.MIT.038
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- Modal -->
<div class="modal fade" id="ChangePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content " style="background-color: #050c2a;">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-body bg-white">
                    <form action="" method="post" id="basicform" data-parsley-validate="">

                        <div class="col-md-12">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password" id="current_password"
                                placeholder="Current Password" required>
                        </div>

                        <div class="col-md-12">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="new_password" id="new_password"
                                placeholder="New Password" required>
                        </div>

                        <div class="col-md-12">
                            <label for="confirm_new_password" class="form-label">Confirm New
                                Password</label>
                            <input type="password" class="form-control" name="confirm_new_password"
                                id="confirm_new_password" placeholder="Confirm New Password" required>
                        </div>

                        <div class="col-md-12">
                            <input type="hidden" class="form-control" name="email"
                                value="<?php echo $_SESSION['admin']; ?>" id="email">
                        </div>


                </div>
                <div class="modal-footer " style="background-color: #050c2a;">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="changePasswordAdmin(this.form)" name="submit" class="btn btn-info">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>