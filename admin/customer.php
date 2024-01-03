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
                        <div class="col-md-9">

                            <h1 class="h3 mb-3"><strong>Customer (
                                    <?php $count = getAllcustomersCount();
                                    $row = mysqli_fetch_assoc($count);
                                    echo $row['count']; ?>
                                    )
                                </strong></h1>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">

                                <?php
                                $getall = getAllcustomers();

                                while ($row = mysqli_fetch_assoc($getall)) {
                                    $customer_id = $row['customer_id'];
                                    ?>
                                    <div class="row one-item mt-2">

                                        <div class="row">
                                            <div class="col-md-4">

                                                <p>
                                                    Name :
                                                    <?php echo $row['name']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>
                                                    Phone :
                                                    <?php echo $row['phone']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>
                                                    Email :
                                                    <?php echo $row['email']; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <p>
                                                    NIC :
                                                    <?php echo $row['nic']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>
                                                    Address :
                                                    <?php echo $row['address']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                    Gender :
                                                    <?php if ($row['gender'] == "1") {
                                                        echo "Male";
                                                    } else {
                                                        echo "Female";
                                                    } ?>
                                                </p>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button"
                                                    onclick="deleteData(<?php echo $row['customer_id']; ?>,'customer', 'customer_id')"
                                                    class="btn btn-light"> <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>

                                        </div>

                                    </div>


                                <?php } ?>


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