<!doctype html>
<html lang="en">

<?php include 'pages/head.php'; ?>
<?php include 'pages/auth.php'; ?>

<body>
    <!--================Header Area =================-->
    <header class="header_area">
         <div class="container-fluid bg-light">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
               <a class="navbar-brand logo_h" href="index.php"><img style=" width:300px " src="image/Logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item active"><a class="nav-link" href="about.php">About us</a></li>

                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <?php if (isset($_SESSION['customer'])): ?>
                        <li class="nav-item"><a class="nav-link" href="admin/logout.php">Logout</a></li>
                                                  <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                        <li class="nav-item "><a class="nav-link" href="booking_list.php">Booking List</a></li>

                        <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="admin/login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin/register.php">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Area =================-->

    <!--================Breadcrumb Area =================-->

    <style>
    .breadcrumb_area .bg-parallax {
        background: url("<?php echo $subheader_src; ?>") no-repeat scroll center 0/cover;
        opacity: 0.50;
        z-index: -1;
    }
    </style>
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Change Password</h2>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Profile</li>
                    <li class="active">Change Password</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->


    <!--================ About History Area  =================-->
    <section class="about_history_area section_gap">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 mb-5 my-lg-12 py-5 pl-lg-5 bg-white">
                    <form method="POST" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                        <div class="col-md-12 mt-2">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password" id="current_password"
                                placeholder="Current Password" required>
                        </div>

                        <div class="col-md-12 mt-4">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="new_password" id="new_password"
                                placeholder="New Password" required>
                        </div>

                        <div class="col-md-12 mt-4">
                            <label for="confirm_new_password" class="form-label">Confirm New
                                Password</label>
                            <input type="password" class="form-control" name="confirm_new_password"
                                id="confirm_new_password" placeholder="Confirm New Password" required>
                        </div>

                        <div class="col-md-12 mt-4">
                            <input type="hidden" class="form-control" name="customer_id"
                                value="<?php echo $_SESSION['customer']; ?>" id="customer_id">
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="changePassword(this.form)"
                                        class="btn btn-primary">Change Password</button>
                                </div>
                                <div class="col-lg-12 mt-2">
                                    <a href="profile.php" class="btn btn-secondary" data-bs-dismiss="modal">Back
                                        to
                                        Profile</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
    <!--================ About History Area  =================-->



    <!--================ start footer Area  =================-->
    <?php include "pages/footer.php"; ?>
    <!--================ End footer Area  =================-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>