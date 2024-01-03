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
                            <h1 class="h3 mb-3"><strong>Settings</strong></h1>
                        </div>




                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill no-background">
                                <div class="row settings-card">
                                        <div class="col-md-6">
                                        <h6>ACCOUNT SETTINGS</h6>
                                        <hr>
                                        <?php
                                                $setting = getAllSettings();
                                                if($res = mysqli_fetch_assoc($setting)){
                                                    
                                                    $img = $res['header_image'];
                                                    $img_src = "../server/uploads/settings/".$img;

                                                    $imgs = $res['sub_image'];
                                                    $imgs_src = "../server/uploads/settings/".$imgs;

                                                    $imgs1 = $res['header_rotate_image'];
                                                    $imgs1_src = "../server/uploads/settings/".$imgs1;
                                            ?>


                                        <div class="col-md-12 mt-3">
                                        <a class="text-white text-small" data-bs-toggle="modal" data-bs-target="#ChangePasswordModal">
                                                  Change Password
                                            </a>
                                        </div>

                                        <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row settings-card">
                                        <div class="col-md-6">
                                        <h6>HEADER INFORMATION</h6>
                                        <hr>
                                        <?php
                                                $setting = getAllSettings();
                                                if($res = mysqli_fetch_assoc($setting)){
                                                    
                                                    $img = $res['header_image'];
                                                    $img_src = "../server/uploads/settings/".$img;

                                                    $imgs = $res['sub_image'];
                                                    $imgs_src = "../server/uploads/settings/".$imgs;

                                                    $imgs1 = $res['header_rotate_image'];
                                                    $imgs1_src = "../server/uploads/settings/".$imgs1;
                                            ?>


                                        <div class="col-md-12 mt-3">
                                            <label for="validationCustom01" class="form-label">Header Title</label>
                                            <input type="text" onchange='settingsUpdate(this, "header_title")'
                                                value="<?php echo $res['header_title']; ?>" class="form-control"
                                                name="category_name" id="validationCustom01" placeholder="Header Title"
                                                required>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for="product_desc" class="form-label">Header Description</label>
                                            <textarea onchange='settingsUpdate(this, "header_desc")' class="form-control"
                                                id="header_desc" required
                                                rows="3"><?php echo $res['header_desc']; ?></textarea>
                                        </div>
                                        <form class="mt-3" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <input type="hidden" name="field" id="field" value="header_image">
                                                <label for="formFile" class="form-label">Header Image file</label>
                                                <input class="form-control" onchange="uploadSettingImage(this.form);"
                                                    name="file" type="file" id="formFile">
                                            </div>

                                        </form>
                                        <img class="mt-2" width="200px" src='<?php echo $img_src; ?>'>

                                        <form class="mt-3" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <input type="hidden" name="field" id="field" value="sub_image">
                                                <label for="formFile" class="form-label">Sub header Image file</label>
                                                <input class="form-control" onchange="uploadSettingImage(this.form);"
                                                    name="file" type="file" id="formFile">
                                            </div>

                                        </form>
                                        <img class="mt-2" width="200px" src='<?php echo $imgs_src; ?>'>


                                        <form class="mt-3" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <input type="hidden" name="field" id="field" value="header_rotate_image">
                                                <label for="formFile" class="form-label">Background Image file</label>
                                                <input class="form-control" onchange="uploadSettingImage(this.form);"
                                                    name="file" type="file" id="formFile">
                                            </div>

                                        </form>
                                        <img class="mt-2" width="200px" src='<?php echo $imgs1_src; ?>'>





                                        <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row settings-card">
                                        <div class="col-md-6">

                                    <h6 class="mt-5">ABOUT SETTINGS</h6>
                                    <hr>
                                    <?php
                                            $setting = getAllSettings();
                                            if($res = mysqli_fetch_assoc($setting)){

                                                $about = $res['about_image'];
                                                $about_src = "../server/uploads/settings/".$about;
                                        ?>


                                    <div class="col-md-12 mt-3">
                                        <label for="validationCustom01" class="form-label">About Title</label>
                                        <input type="text" onchange='settingsUpdate(this, "about_title")'
                                            value="<?php echo $res['about_title']; ?>" class="form-control"
                                            id="about_title" placeholder="About Title" required>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="product_desc" class="form-label">About Description</label>
                                        <textarea onchange='settingsUpdate(this, "about_desc")' class="form-control"
                                            id="about_desc" required
                                            rows="3"><?php echo $res['about_desc']; ?></textarea>

                                        <form class="mt-3" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <input type="hidden" name="field" id="field" value="about_image">
                                                <label for="formFile" class="form-label">About Image file</label>
                                                <input class="form-control" onchange="uploadSettingImage(this.form);"
                                                    name="file" type="file" id="formFile">
                                            </div>

                                        </form>
                                        <img class="mt-2" width="200px" src='<?php echo $about_src; ?>'>


                                        <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row settings-card">
                                        <div class="col-md-6">

                                        <h6 class="mt-5">CONTACT SETTINGS</h6>
                                        <hr>
                                        <?php
                                            $setting = getAllSettings();
                                            if($res = mysqli_fetch_assoc($setting)){ ?>

                                        <div class="col-md-12 mt-3">
                                            <label for="validationCustom01" class="form-label">Company Phone
                                                Number</label>
                                            <input type="text" onchange='settingsUpdate(this, "company_phone")'
                                                value="<?php echo $res['company_phone']; ?>" class="form-control"
                                                id="company_phone" placeholder="Company Phone Number" required>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="validationCustom01" class="form-label">Company Email
                                                Address</label>
                                            <input type="text" onchange='settingsUpdate(this, "company_email")'
                                                value="<?php echo $res['company_email']; ?>" class="form-control"
                                                id="company_email" placeholder="Company Email Address" required>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="validationCustom01" class="form-label">Company Address</label>
                                            <input type="text" onchange='settingsUpdate(this, "company_address")'
                                                value="<?php echo $res['company_address']; ?>" class="form-control"
                                                id="company_address" placeholder="Company Address" required>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="validationCustom01" class="form-label">Facebook Link</label>
                                            <input type="text" onchange='settingsUpdate(this, "link_facebook")'
                                                value="<?php echo $res['link_facebook']; ?>" class="form-control"
                                                id="link_facebook" placeholder="Facebook Link" required>
                                            <a
                                                href="<?php echo $res['link_facebook']; ?>"><?php echo $res['link_facebook']; ?></a>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="validationCustom01" class="form-label">Twitter Link</label>
                                            <input type="text" onchange='settingsUpdate(this, "link_twiiter")'
                                                value="<?php echo $res['link_twiiter']; ?>" class="form-control"
                                                id="link_twiiter" placeholder="Twitter Link" required>
                                            <a
                                                href="<?php echo $res['link_twiiter']; ?>"><?php echo $res['link_twiiter']; ?></a>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="validationCustom01" class="form-label">Instragram Link</label>
                                            <input type="text" onchange='settingsUpdate(this, "link_instragram")'
                                                value="<?php echo $res['link_instragram']; ?>" class="form-control"
                                                id="link_instragram" placeholder="Instragram Link" required>
                                            <a
                                                href="<?php echo $res['link_instragram']; ?>"><?php echo $res['link_instragram']; ?></a>
                                        </div>


                                        <?php } ?>

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