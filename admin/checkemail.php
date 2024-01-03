<!DOCTYPE html>
<html style="background-color: #050c2a;" lang="en">


<?php include 'template/head.php'; ?>

<body>
    <main class="d-flex w-100" style="background-color: #050c2a;">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <h1 style="color: #050c2a; text-align: center;"><b>Rawana Hotel - Email Validation</b></h1>
                                    <form action="" method="post">
                                        <div class="form-floating mb-3 mt-5">
                                            <input type="email" class="form-control" id="floatingInput" name="email"
                                                placeholder="name@example.com">
                                            <label for="floatingInput">Email address</label>
                                        </div>
                
                                        <button type="button" onclick="checkCustomerEmail(this.form)"
                                            class="btn btn-primary py-3 w-100 mb-4">Check Email</button>
                                        <p class="text-center mb-0">Already have an Account? <a href="login.php">Sign In</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/app.js"></script>
    <?php include 'template/footer_script.php'; ?>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>