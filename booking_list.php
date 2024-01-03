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
                        <li class="nav-item "><a class="nav-link" href="about.php">About us</a></li>

                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <?php if (isset($_SESSION['customer'])): ?>
                        <li class="nav-item"><a class="nav-link" href="admin/logout.php">Logout</a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                        <li class="nav-item active"><a class="nav-link" href="booking_list.php">Booking List</a></li>
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
                <h2 class="page-cover-tittle">Booking List</h2>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Booking List</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->


    <!--================ About History Area  =================-->
    <section class="about_history_area section_gap" style="margin-bottom: -5%;">
        <div class="container">
            <ul>
                <?php
            $getall = getAllbookingByCustomer($_SESSION['customer']);

            while ($row = mysqli_fetch_assoc($getall)) {

                $booking_id = $row['booking_id'];
                $room_id = $row['room_id'];
                $img = $row['room_image'];
                $img_src = "server/uploads/room/" . $img; ?>

                <li class="list-group-item clearfix mt-3 box-shadow">
                    <img class="img-responsive img-rounded list_image" src="<?php echo $img_src; ?>" alt="" />
                    <h3 class="list-group-item-heading">
                    <?php echo $row['room_name']; ?>
                    <span class="label label-danger text-white pull-right status-label" style="font-size : 18px"> 
                        <?php if ($row['booking_status'] == "0") {
                            echo 'Pending';
                        }else if($row['booking_status'] == "1"){
                            echo 'Accept';
                        } elseif($row['booking_status'] == "2"){
                            echo 'Canceled';
                        } ?>
                    </span>
                    </h3>
                    <p class="list-group-item-text">
                       Arrival Date : <?php echo  $row['arrival_date']; ?><br>
                       Departure Date : <?php echo  $row['departure_date']; ?><br>
                       Total : Rs. <?php echo  $row['total']; ?>.00<br>
                       Number of guests : <?php echo  $row['booking_occupancy']; ?><br>
                    </p>
                    <div class="btn-toolbar pull-right" role="toolbar" aria-label="">
                    <?php if ($row['booking_status'] != "2") { ?>
                    <select
                        onchange='updateDataFromHome(this, "<?php echo $booking_id; ?>","booking_status", "booking", "booking_id")'
                        id="booking_status <?php echo $booking_id; ?>" class='form-control norad tx12' name="booking_status"
                        type='text'>
                        <option value="0">
                            ... Please Select Cancel ...
                        </option>
                        <option value="2">
                            Booking Canceled
                        </option>
                    </select>
                    <?php } ?>
                    </div>
                </li>
                <?php } ?>

            </ul>
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
<style>
    .list-group {
        box-shadow: 0px 11px 23px 5px rgba(0, 0, 0, 0.34);
    }

    .list-group-item {
        background-color: rgba(255, 255, 255, 0.7);
        border: 0;
    }

    .btn-toolbar {
        margin-top: 10px;
    }

    .list_image {
        float: left;
        margin-right: 15px;
        height: 128px;
        width: 128px;
    }

    /* ==== FONTS ==== */
    @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);
</style>

</html>