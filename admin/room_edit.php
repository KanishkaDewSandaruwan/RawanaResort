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
                            <h1 class="h3 mb-3"><strong>Update Room (
                                    <?php echo $_REQUEST['room_id']; ?>)
                                </strong></h1>
                        </div>
                        <div class="col-md-2">
                            <a href="rooms.php" class="btn btn-info">Back to List</a>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-6 col-xxl-6 d-flex">
                            <div class="card flex-fill no-background">

                                <?php
                                if (isset($_REQUEST['room_id'])) {
                                    $getall = getroomByID($_REQUEST['room_id']);
                                    $row = mysqli_fetch_assoc($getall);
                                    $room_id = $row['room_id'];

                                    $img = $row['room_image'];
                                    $img_src = "../server/uploads/room/" . $img; ?>

                                    <div class="form-group mt-2">
                                        <label for="room_name" class="form-label">Room Name</label>
                                        <input id="inputName" type="text" name="room_name" data-parsley-trigger="change"
                                            onchange="updateData(this, '<?php echo $room_id; ?>', 'room_name', 'room', 'room_id');"
                                            value="<?php echo $row['room_name']; ?>" required=""
                                            placeholder="Enter Full Name" autocomplete="off" class="form-control">
                                    </div>

                                    <div class="form-group mt-3">
                                        <img width="300px" id="images<?php echo $room_id; ?>"
                                            onclick="upImage(<?php echo $room_id; ?>)" src='<?php echo $img_src; ?>'>
                                        <form class="mt-2" enctype="multipart/form-data" method="POST">
                                            <div class="mb-3">
                                                <input class="form-control" value="<?php echo $row['room_id'] ?>" name="id"
                                                    type="hidden" id="id">
                                                <input class="form-control" value="room_id" name="id_fild" type="hidden"
                                                    id="id_fild">
                                                <input class="form-control" value="room" name="table" type="hidden"
                                                    id="table">
                                                <input class="form-control" value="room_image" name="field" type="hidden"
                                                    id="field">
                                                <input onchange="uploadImageroomEdit(this.form);" class="form-control mt-3"
                                                    name="file" type="file" id="formFile">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="form-group mt-2">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">Rooms</h5>
                                        <form enctype="multipart/form-data" method="POST">
                                            <textarea id="room_details" rows="5" cols="50" name="room_details"
                                                onchange="updateData(this, '<?php echo $room_id; ?>', 'room_details', 'room', 'room_id');"><?php echo $row['room_details']; ?></textarea>
                                            <input class="form-control" value="<?php echo $row['room_id'] ?>" name="id"
                                                type="hidden" id="id">
                                            <button type="button" onclick="changeDescription(this.form)"
                                                class="btn btn-primary">Update Description</button>
                                        </form>
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

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>