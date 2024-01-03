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
                        <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                        <li class="nav-item active"><a class="nav-link" href="accomodation.php">Accomodation</a></li>
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
    <?php
    if (isset($_REQUEST['room_id'])):

        $getall = getroomByID($_REQUEST['room_id']);
        if ($row = mysqli_fetch_assoc($getall)) {
            $room_id = $row['room_id'];

            $fee = $row['room_price'];
            $arrival_date = $_REQUEST['arrival_date'];
            $departure_date = $_REQUEST['departure_date'];

            $diff = abs(strtotime($arrival_date) - strtotime($departure_date));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            $total = $fee * $days;

            $img = $row['room_image'];
            $img_src = "server/uploads/room/" . $img; 
            
            if(isset($_SESSION['customer'])){
                $getCustomer = getAllcustomerById($_SESSION['customer']);
                $customerrow = mysqli_fetch_assoc($getCustomer);
            }
            ?>

            

            <!--================Booking Tabel Area =================-->
            <section class="hotel_booking_area">
                <div class="container rounded bg-white">
                    <div class="row d-flex justify-content-center pb-5">
                        <div class="col-sm-4 col-md-4 ml-1">
                            <div class="py-4 pl-6 d-flex flex-row">
                                <h5><span class="fa fa-check-square-o"></span><b>ELIGIBLE</b> | </h5><span
                                    class="pl-2">Pay</span>
                            </div>
                            <div class="bg-white p-2 d-flex flex-column" style="border-radius:14px">
                                <div class="text-center mt-4 mb-3"> <img class="img-fluid" src="<?php echo $img_src; ?>"
                                        width="100%" /> </div>
                                <h5>
                                    <?php echo $row['room_name']; ?>
                                </h5>
                                <h4 class="green">Rs.
                                    <?php echo $row['room_price']; ?>.00
                                </h4>

                            </div>
                        </div>
                        <div class="col-sm-5 col-md-6 mobile">
                            <div class="py-4 d-flex justify-content-end">
                                <h6><a href="#">Cancel and return to website</a></h6>
                            </div>
                            <div class="bg-white p-3 d-flex flex-column" style="border-radius:14px">
                                <div class="pt-2">
                                    <h5>Summary</h5>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Room Price</div>
                                    <div class="ml-auto"><b>Rs.
                                            <?php echo $row['room_price']; ?>.00
                                        </b></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Occupancy</div>
                                    <div class="ml-auto"><b>
                                            <?php echo $_REQUEST['booking_occupancy']; ?>
                                        </b></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Arrival Date</div>
                                    <div class="ml-auto"><b>
                                            <?php echo $_REQUEST['arrival_date']; ?>
                                        </b></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Depature Date</div>
                                    <div class="ml-auto"><b>
                                            <?php echo $_REQUEST['departure_date']; ?>
                                        </b></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Number of Days</div>
                                    <div class="ml-auto"><b>
                                            <?php echo $days; ?>
                                        </b></div>
                                </div>
                                <div class="pt-2">
                                    <h5>Payment details</h5>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Total Amount</div>
                                    <div class="ml-auto green">Rs.
                                        <?php echo $total; ?>.00
                                    </div>
                                </div>
                            </div>
                            <form class="p-5" action="" method="post">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" value="<?php if(isset($customerrow['name'])) { echo $customerrow['name'];} ?>" id="name" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" <?php if(isset($_SESSION['customer'])) { echo 'readonly';} ?> value="<?php if(isset($customerrow['email'])) { echo $customerrow['email'];} ?>" id="email" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" value="<?php if(isset($customerrow['phone'])) { echo $customerrow['phone'];} ?>" id="phone" name="phone" required>
                                </div>

                                <div class="form-group">
                                    <label for="nic">NIC:</label>
                                    <input type="text" class="form-control" value="<?php if(isset($customerrow['nic'])) { echo $customerrow['nic'];} ?>" id="nic" name="nic" required>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <textarea class="form-control" id="address" name="address" rows="3"
                                        required><?php if(isset($customerrow['address'])) { echo $customerrow['address'];} ?></textarea>
                                </div>

                                <input type="hidden" value="<?php echo $room_id; ?>" id="room_id" name="room_id">
                                <input type="hidden" value="<?php echo $arrival_date; ?>" id="arrival_date" name="arrival_date">
                                <input type="hidden" value="<?php echo $departure_date; ?>" id="departure_date"
                                    name="departure_date">
                                <input type="hidden" value="<?php echo $total; ?>" id="total" name="total">
                                <input type="hidden" value="<?php echo $_REQUEST['booking_occupancy']; ?>"
                                    id="booking_occupancy" name="booking_occupancy">

                                <button type="button" onclick="bookRoom(this.form)" class=" btn mt-4 w-50 btn-primary btn-block"
                                    style="border-radius:100px; background-color:#2447f9;">I'll reserve</button>
                            </form>
                            <div class="text-left p-3"> <a class="text-link " target="_blank" href="index.php">Back to Home</a>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
            </section>
        <?php }endif; ?>
    <!--================ Accomodation Area  =================-->
    <!--================ start footer Area  =================-->
    <?php include "pages/footer.php"; ?>
    <!--================ End footer Area  =================-->

    <style>
        body {
            background-color: #F6F8FD
        }

        .bg {
            background-color: #F6F8FD
        }

        .green {
            color: rgb(15, 207, 143);
            font-weight: 680
        }

        @media(max-width:567px) {
            .mobile {
                padding-top: 40px
            }
        }
    </style>
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