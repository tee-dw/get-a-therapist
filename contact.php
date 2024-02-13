<?php

error_reporting(E_ALL);
require_once("partials/header.php");

?>
        <!-- header ends here -->
        <!-- hero starts here -->
        <div class="row contact-us">
            <div class="col-md">
                <div class="text-overlay-contactus">
                    <h1 class="display-5"><strong>Contact Us</strong></h1>
                    <div>
                        <hr style="margin-left: 0;">
                    </div>
                    <p class="my-2">Let's help you get the best therapy you need</p>
                </div>
            </div>
        </div>
        <!-- hero ends here -->
        <!-- Contact/Newsletter form starts here -->
        <div class="row gat-form-row">
            <div class="col-md-5 gat-form-img">
            </div>
            <div class="col-md-7 mx-auto gat-form-div">
                <form class="form-control" id="gat-form" action="process/process_contact_form.php" method="post">
                    <div class="col-md pt-5 gat-form-heading">
                        <h4 class="p-2"><b> Having a <span class="gat-form-heading-span"> hard </span> time with your Mental Health? </b></h4>
                        <?php

                            if(isset($_SESSION['guest_feedback'])){

                                print "<div class='alert alert-success'>" . $_SESSION['guest_feedback'] . "</div>";
                                unset($_SESSION['guest_feedback']);

                            }

                        ?>
                        <hr class="mt-2 w-100">
                        <div class="col-md-10 mx-auto contact-sub-heading">
                            <p class="p-2">Let's help you select your personal Therapist...</p>
                        </div>
                    </div>
                    <div class="row g-2 fillin" id="guest">
                        <div class="col-md">
                        <p class="password-instruction mt-1" style="color:red"></p>
                            <div class="form-floating" id="guestfill">
                                <input type="text" class="form-control my-3" name="fname" id="firstname" placeholder="">
                                <label class="form-label" for="firstname">First Name</label>
                                
                            </div>
                            <div class="form-floating" id="guestfill">
                                <input type="text" class="form-control my-3" name="lname" id="lastname" placeholder="">
                                <label class="form-label" for="lastname">Last Name</label>
                                
                            </div>
                            <div class="form-floating" id="guestfill">
                                <input type="email" class="form-control my-3" name="email" id="email" placeholder="">
                                <label class="form-label" for="email">Email Address</label>
                                
                            </div>
                            <div class="my-2" id="guestfill">
                                <textarea class="form-control" name="messages" id="msg" cols="70" rows="5" placeholder="Message"></textarea>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md gat-form-btn">
                        <button class="col-md btn btn-lg gat-form-button" name="gatform_submit" id="gatform_submit" type="Submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Contact/Newsletter form ends here -->
        <!-- Footer begins here -->
        <?php

            require_once("partials/footer.php");

        ?>
    <script>
        $(document).ready(function(){

            $("#gatform_submit").click(function(event){

                var firstname = document.getElementById('firstname').value;
                var lastname = document.getElementById('lastname').value;
                var email = document.getElementById('email').value;
                var msg = document.getElementById('msg').value;

                if(firstname == ''){
                    event.preventDefault();
                    $("#firstname").css("border", "1px solid red");
                    $(".password-instruction").text("Fields cannot be empty.");
                } else {
                    $(".password-instruction").text("");
                }

                if(lastname == ''){
                    event.preventDefault();
                    $(".password-instruction").text("Fields cannot be empty.");
                    $("#lastname").css("border", "1px solid red");
                } else {
                    $(".password-instruction").text("");
                }

                if(email == ''){
                    event.preventDefault();
                    $(".password-instruction").text("Fields cannot be empty.");
                    $("#email").css("border", "1px solid red");
                } else {
                    $(".password-instruction").text("");
                }

                if(msg == ''){
                    event.preventDefault();
                    $(".password-instruction").text("Fields cannot be empty.");
                    $("#msg").css("border", "1px solid red");
                } else {
                    $(".password-instruction").text("");
                }
            });



        })

    </script>
</body>
</html>