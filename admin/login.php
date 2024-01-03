<!DOCTYPE html>
<html lang="en">

<?php include 'template/head.php'; ?>

<body>
    <main class="d-flex w-100" style="background-color: #050c2a;">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                        </div>

                        <div class="card">
                            <div class="login-logo-container">
                                <img src="../image/Logo.png" width="50%" height="100%" alt="Logo" />
                            </div>
                            <!-- <h1 style="color: #050c2a; text-align: center;"><b>Rawana Hotel-LOGIN</b></h1> -->
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                id="email" placeholder="Enter your email" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                id="password" placeholder="Enter your password" />
                                            <small>
                                                <a href="index.html">Forgot password?</a>
                                            </small>
                                        </div>

                                        <div class="text-center mt-3">
                                            <button type="button" onclick="login(this.form)"
                                                class="btn w-100 btn-lg btn-primary">Log In</button>
                                            <p class="text-center mb-0 mt-2">You don't have an Account? <a
                                                    href="checkemail.php">Register</a></p>
                                        </div>
                                    </form>
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