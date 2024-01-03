<!DOCTYPE html>
<html lang="en">
<?php include 'template/head.php'; ?>

<body>
    <div class="wrapper">

        <?php include 'template/navbar.php'; ?>

        <div class="main">

            <?php include 'template/topbar.php'; ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="h3 mb-3"><strong>Booking</strong></h1>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">
                            <?php
                                $itemsPerPage = 5; // Number of items per page
                                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get current page, default is 1
                                $offset = ($currentPage - 1) * $itemsPerPage;
                                
                                $getall = getAllBookingWithLimit($offset, $itemsPerPage); // Modify your function to include LIMIT in the query

                                while ($row = mysqli_fetch_assoc($getall)) {
                                    $booking_id = $row['booking_id'];
                                    ?>

                                    <div class="row one-item mt-2">
                                        <div class="row">
                                            <div class="col-md-5 mt-2">
                                                <?php
                                                $getRoom = getroomByID($row['room_id']);
                                                $row2 = mysqli_fetch_assoc($getRoom);
                                                $room_id = $row2['room_id'];
                                                $img = $row2['room_image'];
                                                $img_src = "../server/uploads/room/" . $img;
                                                ?>
                                                <img width="200px" src='<?php echo $img_src; ?>'>

                                            </div>
                                            <div class="col-md-3">
                                                <p>Room :
                                                    <?php echo $row2['room_name']; ?>
                                                </p>
                                                <p>Price :
                                                    <?php echo $row2['room_price']; ?>
                                                </p>
                                                <p>Arrival Date :
                                                    <?php echo $row['arrival_date']; ?>
                                                </p>
                                                <p>Depature Date :
                                                    <?php echo $row['departure_date']; ?>
                                                </p>
                                                <p>Booking Date :
                                                    <?php echo $row['date_updated']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>Booking Reference : #
                                                    <?php echo $row['booking_id']; ?>
                                                </p>
                                                <p>Total :
                                                    <span class="price_label"> Rs.
                                                        <?php echo $row['total']; ?>.00
                                                    </span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <?php echo $row['name']; ?><br>
                                                <?php echo $row['phone']; ?><br>
                                                <?php echo $row['email']; ?><br>
                                                <?php echo $row['address']; ?>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <p>Status : </p>
                                                <div class="form-group">
                                                    <select
                                                        onchange='updateData(this, "<?php echo $booking_id; ?>","booking_status", "booking", "booking_id")'
                                                        id="booking_status <?php echo $booking_id; ?>" class='form-control'
                                                        name="booking_status" type='text'>
                                                        <option value="0" <?php if ($row['booking_status'] == "0")
                                                            echo "selected"; ?>>
                                                            Pending
                                                        </option>
                                                        <option value="1" <?php if ($row['booking_status'] == "1")
                                                            echo "selected"; ?>>
                                                            Accept
                                                        </option>
                                                        <option value="2" <?php if ($row['booking_status'] == "2")
                                                            echo "selected"; ?>>
                                                            Cancel
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                            </div>
                                            <div class="col-md-1">

                                                <a href="bille.php?booking_id=<?php echo $row['booking_id']; ?>"
                                                    class="btn btn-light"> <i class="fa-solid fa-file-pdf"></i>
                                                </a>

                                                <button type="button"
                                                    onclick="deleteData(<?php echo $row['booking_id']; ?>,'booking', 'booking_id')"
                                                    class="btn btn-light mt-2"> <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>


                                <?php } ?>

                                <!-- Pagination Links -->
                                <div class="row mt-5">
                                    <div class="col-md-12 text-center">
                                        <?php
                                        $totalRows = getTotalBookingCount(); // Modify your function to get the total number of rows
                                        $totalPages = ceil($totalRows / $itemsPerPage);

                                        for ($i = 1; $i <= $totalPages; $i++) {
                                            echo "<a href='?page=$i' class='btn btn-light'>$i</a>";
                                        }
                                        ?>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <?php include 'template/footer.php'; ?>

        </div>
    </div>

    <?php include 'template/footer_script.php'; ?>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>