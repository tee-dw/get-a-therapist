<?php

error_reporting(E_ALL);
session_start();
require_once("partials/header.php");

?>
        <!-- header ends here -->
        <!-- hero starts here -->
        <div class="row login">
            <div class="col-md">
                <div class="text-overlay">
                    <h1 class="display-5"><strong>Login</strong></h1>
                    <div>
                        <hr style="margin-left: 0;">
                    </div>
                    <p class="my-2">Welcome back! It's been a minute...</p>
                </div>
            </div>
        </div>
        <!-- hero ends here -->
        <!-- Login form starts here -->
            <div class="row d-flex login-form-row">
                <div class="col-md-5 login-form-img">
                    <img src="assets/images/login-img.png" class="animate__animated animate__slideInLeft" width="100%" alt="">
                </div>
                <div class="col-md-7 d-flex animate__animated animate__slideInRight">
                    <div class="col d-flex login-form">
                        <div class="col-md-6 therapist-login-form">
                            <form action="process/process_therapist_login.php" method="post" class="the-login-form">
                                <div class="col avatar my-3">
                                    <div class="col-md-4 therapist-profile-avatar"></div>
                                </div>
                                    <?php

                                        if(isset($_SESSION['error_message'])){
                                            print "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
                                            unset($_SESSION['error_message']);
                                        }

                                    ?>
                                <div class="input-group my-3">
                                    <input type="text" name="therapist_email" class="form-control therapist-login" placeholder="email" aria-label="email">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="input-group col my-3">
                                    <input type="password" name="therapist_pwd" class="form-control therapist-login" placeholder="password" aria-label="password">
                                    <i class="fa-solid fa-lock"></i>
                                </div>                        
                                        <div class="form-check col mb-3">
                                            <input class="form-check-input" type="checkbox" id="remember_user">
                                            <label class="form-check-label" for="remember_user" id="remember_me">Remember me</label>
                                            <span class="offset-2" id="forgot_password"><a href="forgot_password.php"><i>Forgot password</i></a></span>
                                        </div>                       
                                <button class="btn therapist-login-button col-md-12" name="btn_login_therapist" type="submit">Login as a Therapist</button>
                            </form>
                        </div>
                        <div class="col-md-6 patient-login-form">
                            <form action="process/process_patient_login.php" method="post" class="the-login-form">
                                <div class="col avatar my-3">
                                    <div class="col-md-4 patient-profile-avatar"></div>
                                </div>
                                <?php

                                        if(isset($_SESSION['error_message'])){
                                            print "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
                                            unset($_SESSION['error_message']);
                                        }

                                ?>
                                <div class="input-group my-3">
                                    <input type="text" name="patient_email" class="form-control patient-login" placeholder="email" aria-label="email">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="input-group col my-3">
                                    <input type="password" name="patient_pwd" class="form-control patient-login" placeholder="password" aria-label="password">
                                    <i class="fa-solid fa-lock"></i>
                                </div>                         
                                <div class="form-check col mb-3">
                                            <input class="form-check-input" type="checkbox" id="remember_user">
                                            <label class="form-check-label" for="remember_user" id="remember_me">Remember me</label>
                                            <span class="offset-2" id="forgot_password"><a href="forgot_password.html"><i>Forgot password</i></a></span>
                                </div>                       
                                <button class="btn patient-login-button col-md-12" name="btn_login_patient" type="submit">Login as a Patient</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Login form ends here -->
        <!-- Reviews begins here -->
        <div class="row">
            <div class="col reviews">
                <div id="reviews" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active patient-review">
                            <div class="col-md-6 m-auto">
                                <div class="col-md-4 patient-profile-img"></div>
                            </div>
                            <hr class="my-3" style="width:200px;"/>
                            <div class="col-md-6 m-auto review-text">
                                <h6><b>Great Service!</b></h6>
                                <p>I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. </p>
                                <p>I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. </p>
                                <p>I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. </p>
                                <p>I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. </p>
                            </div>
                        </div>
                        <div class="carousel-item patient-review"> 
                                <div class="col-md-6 m-auto">
                                    <div class="col-md-4 patient-profile-img"></div>
                                </div> 
                                <hr class="my-3" style="width:200px;"/>
                                <div class="col-md-6 m-auto review-text">
                                    <h6><b>Great Service!</b></h6>
                                    <p>I love it. I love it. I love it. I love it. </p>
                                    <p>I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. </p>
                                    <p>I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. </p>
                                    <p>I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. </p>
                                </div>
                        </div>
                        <div class="carousel-item patient-review">
                                <div class="col-md-6 m-auto">
                                    <div class="col-md-4 patient-profile-img"></div>
                                </div>
                                <hr class="my-3" style="width:200px;"/>
                                <div class="col-md-6 m-auto review-text">
                                    <h6><b>Great Service!</b></h6>
                                    <p>I love it. </p>
                                    <p>I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. </p>
                                    <p>I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. I love it. </p>
                                </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Review ends here -->
        <!-- Footer begins here -->
        <?php

            require_once("partials/footer.php");

        ?>
    <script>

        
    </script>
</body>
</html>