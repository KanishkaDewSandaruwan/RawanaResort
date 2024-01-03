<!doctype html>
<html lang="en">
<?php include 'pages/head.php'; ?>
    <body>
        <!--================Header Area =================-->
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                   <a class="navbar-brand logo_h" href="index.php"><img style=" width:300px " src="image/Logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li> 
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
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Accomodation</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Accomodation</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
            <!--================ Accomodation Area  =================-->
    <?php
   if (isset($_REQUEST['arrival_date']) && isset($_REQUEST['departure_date']) && isset($_REQUEST['booking_occupancy'])):
    $getall = getAllroomwithOCC($_REQUEST['booking_occupancy']);
    if ($row = mysqli_fetch_assoc($getall)) :
        $room_id = $row['room_id'];
            echo $room_id; ?>

<section class="accomodation_area section_gap">
        <?php 
       $rent_count = getRoomByDateAvailable($room_id, $_REQUEST['arrival_date'], $_REQUEST['departure_date']);
       $count = mysqli_num_rows($rent_count);

       if($count == 0): ?>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Hotel Accomodation</h2>
            </div>
            <div class="row mb_30">
                <?php
                   $getall = getAllroomwithOCC($_REQUEST['booking_occupancy']);
                    while ($row = mysqli_fetch_assoc($getall)) {

                        $room_id = $row['room_id'];
                        $img = $row['room_image'];
                        $img_src = "server/uploads/room/" . $img;
                        
                        $rent_count = getRoomByDateAvailable($room_id, $_REQUEST['arrival_date'], $_REQUEST['departure_date']);
                        $count = mysqli_num_rows($rent_count);

                        if($count == 0){
                
                        ?>



                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img width="100%" src="<?php echo $img_src; ?>" alt="">
                            <a href="room-details.php?room_id=<?php echo $room_id; ?>&arrival_date=<?php echo $_REQUEST['arrival_date'] ?>&departure_date=<?php echo $_REQUEST['departure_date'] ?>&booking_occupancy=<?php echo $_REQUEST['booking_occupancy'] ?>" class="btn theme_btn button_hover">Details</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4"><?php echo $row['room_name']; ?></h4>
                        </a>
                        <h5>Rs. <?php echo $row['room_price']; ?>.00<small>/Night</small></h5>
                    </div>
                </div>
                <?php }  }?>
                
            </div>
        </div>
        <?php else:  ?>
        <h4 style="margin-left: 10%;">Room Not Available in this date</h4>
        <?php endif; ?>
    </section>
    <?php else:  ?>
        <h4 style="margin: 10%;">Room Not Available in this date</h4>
        <?php endif; ?>
    <?php endif; ?>
    
        <!--================ Accomodation Area  =================-->
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