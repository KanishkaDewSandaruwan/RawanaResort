<!doctype html>
<html lang="en">
<?php include 'pages/head.php'; ?>

<body>
    <!--================Header Area =================-->
    <header class="header_area">
         <div class="container-fluid bg-light">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.php"><img style=" width:300px " src="image/Logo.png"
                        alt=""></a>
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
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
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

    <!--================Banner Area =================-->

    <style>
        .banner_area .bg-parallax {
            background: url("<?php echo $header_src; ?>") no-repeat scroll center 0/cover;
            opacity: 0.50;
        }
    </style>
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>
                        <?php echo $res['header_title']; ?>
                    </h2>
                    <p>
                        <?php echo $res['header_desc']; ?>
                    </p>
                    <a href="gallery.php" class="btn theme_btn button_hover"> Our Gallary</a>
                </div>
            </div>
        </div>
        <div class="hotel_booking_area position">
            <div class="container">
                <div class="hotel_booking_table">
                    <div class="col-md-4">
                        <!-- <h2>Book<br> Your Room</h2> -->
                        <img src="image/Logo.png" width="80%" />
                    </div>
                    <div class="col-md-7">
                        <div class="boking_table">
                            <form method="post">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="book_tabel_item">
                                            <div class="form-group">
                                                <div class='input-group date'>
                                                <input type="text" class="form-control" id="arrival_date"
                                                        name="arrival_date" placeholder="Arrival Date"
                                                        onfocus="(this.type='date')" onblur="(this.type='text')" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group date'>
                                                    <input type="text" class="form-control" id="departure_date"
                                                        name="departure_date" placeholder="Departure Date"
                                                        onfocus="(this.type='date')" onblur="(this.type='text')" />


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="book_tabel_item">
                                            <div class="input-group">
                                                <select class="wide" name="booking_occupancy" id="booking_occupancy">
                                                    <option value="0">Number of Occupancy</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="4">4</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                            <button class="book_now_btn button_hover2" type="button"
                                                onclick="search(this.form)">Book Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================Banner Area =================-->

    <!--================ Accomodation Area  =================-->
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Locations</h2>
            </div>
            <div class="row mb_30 d-flex justify-content-center">
                <?php
                $getall = getAllLocation();
                while ($row = mysqli_fetch_assoc($getall)) {

                    $location_id = $row['location_id'];
                    $img = $row['location_image'];
                    $img_src = "server/uploads/location/" . $img; ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <img width="100%" src="<?php echo $img_src; ?>" alt="">
                            </div>
                            <a href="#">
                                <h4 class="sec_h4">
                                    <?php echo $row['location_name']; ?>
                                </h4>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!--================ Accomodation Area  =================-->

    <!--================ Facilities Area  =================-->
    <section class="facilities_area section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_w">Facilities</h2>
            </div>
            <div class="row mb_30 d-flex justify-content-center">
                <?php
                $getall = getAllFacility();
                while ($row = mysqli_fetch_assoc($getall)) {
                    $facility_id = $row['facility_id']; ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4">
                                <?php echo $row['facility_name']; ?>
                            </h4>
                            <p>
                                <?php echo $row['facility_desc']; ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--================ Facilities Area  =================-->



    <?php include "pages/footer.php"; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>