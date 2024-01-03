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

                            <h1 class="h3 mb-3"><strong>Message Inbox</strong></h1>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">


                                <?php
                                $getall = getAllMessages();

                                while ($row = mysqli_fetch_assoc($getall)) { ?>
                                    <div class="row one-item mt-2">

                                        <div class="row">
                                            <div class="col-md-8">

                                                <p>
                                                    Name :
                                                    <?php echo $row['name']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                    Date :
                                                    <?php echo $row['date_updated']; ?>
                                                </p>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">

                                                <p>
                                                    Email :
                                                    <?php echo $row['email']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>
                                                    Subject :
                                                    <?php echo $row['subject']; ?>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <p>
                                                Message :
                                            </p>
                                            <p>
                                                <?php echo $row['message']; ?>
                                            </p>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-11">
                                                </div>
                                            <div class="col-md-1">
                                                <button type="button"
                                                    onclick="permenantdeleteData(<?php echo $row['contact_id']; ?>, 'contact', 'contact_id' )"
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