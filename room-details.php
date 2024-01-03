<!doctype html>
<html lang="en">
<?php include 'pages/head.php'; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>


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
    <style>
        .breadcrumb_area .bg-parallax {
            background: url("<?php echo $subheader_src; ?>") no-repeat scroll center 0/cover;
            opacity: 0.50;
            z-index: -1;
        }
    </style>
    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area blog_banner_two">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle f_48">Room Details</h2>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="blog.html">Room</a></li>
                    <li class="active">Room Details</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <?php
    if (isset($_REQUEST['room_id']) && $_REQUEST['arrival_date'] && isset($_REQUEST['departure_date']) && isset($_REQUEST['booking_occupancy'])):

        $getall = getroomByID($_REQUEST['room_id']);
        if ($row = mysqli_fetch_assoc($getall)) {
            $room_id = $row['room_id'];

            $img = $row['room_image'];
            $img_src = "server/uploads/room/" . $img; ?>

            <!--================Blog Area =================-->
            <section class="blog_area single-post-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 posts-list">
                            <div class="single-post row">
                                <div class="col-lg-8">
                                    <div class="row" style="height : 400px">

                                        <!-- Larger Main Image -->
                                        <img id="mainImage" class="img-fluid-main" src="<?php echo $img_src; ?>"
                                            alt="Room Image">
                                    </div>
                                    <div class="row thumb-albem">
                                        <!-- Thumbnails -->

                                        <img class="img-fluid thumbnail" src="<?php echo $img_src; ?>"
                                            alt="Thumbnail <?php echo $thumbnailIndex; ?>"
                                            onclick="showMainImage('<?php echo $img_src; ?>')">

                                        <?php
                                        $getallimage = getroomImageByID($_REQUEST['room_id']);
                                        $firstItem = true; // To track the first item
                                        $thumbnailIndex = 1; // To track the index of thumbnails
                                
                                        while ($row1 = mysqli_fetch_assoc($getallimage)) {
                                            $room_imageid = $row1['room_imageid'];
                                            $img = $row1['room_image'];
                                            $thumb_img_src = "server/uploads/room_gallery/" . $img;
                                            ?>

                                            <img class="img-fluid thumbnail" src="<?php echo $thumb_img_src; ?>"
                                                alt="Thumbnail <?php echo $thumbnailIndex; ?>"
                                                onclick="showMainImage('<?php echo $thumb_img_src; ?>')">

                                            <?php
                                            $firstItem = false; // Set to false after the first iteration
                                            $thumbnailIndex++;
                                        }
                                        ?>
                                    </div>

                                </div>

                                <div class="col-lg-4  col-md-3">
                                    <div class="blog_info text-left">
                                        <div class="post_tag">
                                            <h2>
                                                <?php $value = getAllCategoryByID($row['cat_id']);
                                                $row2 = mysqli_fetch_assoc($value);
                                                echo $row2['cat_name']; ?>
                                            </h2>
                                        </div>
                                        <div class="post_tag">

                                            <p>
                                                <span class="price-chip">
                                                    <?php echo $row['room_occupancy']; ?>
                                                </span>
                                                Guest can use this property
                                            </p>
                                            <ul>
                                                <li>It only takes 2 minutes</li>
                                                <li>
                                                    Confirmation is immediate</li>
                                            </ul>
                                        </div>
                                        <div class="post_tag">
                                            <span class="price-chip">
                                                LKR <?php echo $row['room_price']; ?>.00 / Night
                                            </span>
                                        </div>
                                        <a href="checkout.php?room_id=<?php echo $room_id; ?>&arrival_date=<?php echo $_REQUEST['arrival_date'] ?>&departure_date=<?php echo $_REQUEST['departure_date'] ?>&booking_occupancy=<?php echo $_REQUEST['booking_occupancy'] ?>"
                                            class="btn btn-info text-white w-50">Book this Room</a></li>

                                    </div>
                                </div>
                            </div>
                            <div class="blog_details p-5">
                                <h2>
                                    <?php echo $row['room_name']; ?>
                                </h2>
                                <p class="excert">
                                    <?php echo $row['room_details']; ?>
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
        <?php }endif; ?>
    <!--================Blog Area =================-->

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