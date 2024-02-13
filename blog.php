<?php

error_reporting(E_ALL);
session_start();
require_once("classes/Therapist.php");
require_once("classes/Patient.php");
require_once("partials/specialization.php");

$data = $therapist->get_therapistbyid($_SESSION['therapist_online']);

$therapistImage = $therapist->fetch_dp_by_id($_SESSION['therapist_online']);

$blogImage = $therapist->fetch_blogdp_by_id($_SESSION['therapist_online']);

$therapist_id = $_SESSION['therapist_online'];
$blogs = $therapist->get_all_blogs_for_a_therapist($therapist_id)
// print_r($blogs);
// die();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Therapy, Psychology, Counselling, Mental Health, Wellness"/>
	  <meta name="description" content="A Lagos based Theraphy Hub, passionate about shaping the mental health of youths and families globally"/>
    <meta name="author" content="Oluwatobi"/>
	  <meta property="og:title" content="Get A Therapist"/>
	  <meta property="og:description" content="A Lagos based Theraphy Hub, passionate about shaping the mental health of youths and families globally"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Rounded">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fa/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <title>Get A Therapist | Dashboard</title>
    <link rel="icon" type="image/ico" href="assets/images/gat-small-logo.ico" sizes="32x32">
</head>
<body>
    <div class="container-fluid">
         <!-- header starts here -->
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="assets/images/getatherapist_logo.png" class="" width="" height="100" alt="..."></a>
                        <div class="collapse navbar-collapse my-nav col-md-6" id="navbarTogglerDemo03">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact Us</a>
                                </li>
                            </ul>
                            <form class="d-flex nav-form">
                                <!-- <a href="login.php" class="btn login-button d-none" type="submit" id="login-btn">Login</a>
                                <a href="signup.php" class="btn signup-button mx-2 d-none" type="submit" id="signup-btn">Get Started</a> -->
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- header ends here -->
        <!-- hero starts here -->
        <div class="row login">
            <div class="col-md">
                <div class="text-overlay">
                    <h1 class="display-5"><strong>My Blog</strong></h1>
                    <div>
                        <hr style="margin-left: 0;">
                    </div>
                    <p class="my-2"><span style="font-family:'Averia Serif Libre', serif; color:#EC993D; font-style:italic;">Inspire</span> | <span style="font-family:'Averia Serif Libre', serif; color:#EC993D; font-style:italic;">Educate</span> | <span style="font-family:'Averia Serif Libre', serif; color:#EC993D; font-style:italic;">Encourage</span> | <span style="font-family:'Averia Serif Libre', serif; color:#EC993D; font-style:italic;">Motivate</span></p>
                </div>
            </div>
        </div>
        <!-- hero ends here -->
        <!-- Sub-header starts here -->
        <header class="p-3 border-bottom dashboard-header container-fluid">
            <div class="container-fluid">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
               
                <ul class="member nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                    <li><a href="dashboard_therapist.php#my-profile" class="nav-link px-2 " style="color:#EC993D"><b>My Profile</b><span class="divider">|</span></a></li>
                    <li><a href="dashboard_therapist.php#all-bookings" class="nav-link px-2 link-dark">All Bookings<span class="divider">|</span></a></li>
                    <li><a href="dashboard_therapist.php#all-sessions" class="nav-link px-2 link-dark">All Sessions<span class="divider">|</span></a></li>
                    <li><a href="blog.php" class="nav-link px-2 link-dark"><b>My Blog</b></a></li>
                </ul>
        
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="uploads/<?php print $therapistImage; ?>" width="32" height="35" style="border-radius:50%">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="update_therapist_profile.php">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="#">My Blog</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout_therapist.php" id="logout">Sign out</a></li>
                    </ul>
                </div>
              </div>
            </div>
        </header>
        <!-- Sub-header ends here -->
        <!-- Dashboard begins here -->
        <div class="container">
            <form class="" action="process/process_upload_blog.php" method="post" enctype="multipart/form-data" id="blog_form">
                <div class="row" id="my-profile">
                    <div class="content col-md">
                        <div class="mt-3 therapist_feedback">

                                <?php

                                if(isset($_SESSION['therapist_feedback'])){

                                    print "<div class='alert alert-success'>" . $_SESSION['therapist_feedback'] . "</div>";
                                    unset($_SESSION['therapist_feedback']);

                                }

                                ?>

                                <?php

                                if(isset($_SESSION['error_message'])){
                                print "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
                                unset($_SESSION['error_message']);
                                }

                                ?>

                        </div>
                        <h3 class="">Welcome to your blog space, <?php print ($data['therapists_fname']); ?>!</h3>
                        <p>This is where you write to <b><span style="font-family:'Averia Serif Libre', serif; color:#EC993D; font-style:italic;">Inspire</span></b>, <b><span style="font-family:'Averia Serif Libre', serif; color:#EC993D; font-style:italic;">Educate</span></b>, <b><span style="font-family:'Averia Serif Libre', serif; color:#EC993D; font-style:italic;">Encourage</span></b> and <b><span style="font-family:'Averia Serif Libre', serif; color:#EC993D; font-style:italic;">Motivate</span></b> your readers to a life of <b>absolute wellness</b>. Let's begin!</p>
                    </div>
                </div>
                <hr>
                <div class="blog">
                    <div class="row my-5">
                        <div class="col">
                            <h6><b>Your Article Title</b></h6>
                            <input type="text" class="form-control" name="title" id="title" Placeholder="E.g., The Power of Mental Therapy">
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col">
                            <h6><b>Your Article Caption</b></h6>
                            <small>Caption must not be greater than 100 characters!</small>
                            <textarea name="caption" id="caption" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col">
                            <h6><b>Your Article Content</b></h6>
                            <textarea name="content" id="content" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col">
                            <label for="" class="form-label"><b>Upload Article Image</b></label>
                            <input type="file" class="form-control" id="upload_blog" name="upload_blog">
                        </div>
                    </div>
                    <div class="col-md-2 mb-5"> 
                        <button class="btn btn-primary" id="btn_blog" name="btn_blog" type="submit">Update Blog</button>
                    </div>
                </div>
            </form>
            <hr>
            
            <?php

                if ($blogs)
                foreach ($blogs as $blog){
                    $divStyle = ($blog['blog_status'] != "Active") ? 'style="display: none;"' : '';
                    $div_Style = ($blog['blog_therapistid'] != $therapist_id) ? 'style="display: none;"' : '';

            ?>
                <div class="blog d-flex" <?php print $divStyle . $div_Style ?> >
                    <div class="col-md-4 my-5 blog-img-div">
                        <img src="upload/<?php print $blog['blog_img']; ?>" width="70%" alt="">   
                    </div>
                    <div class="col-md-8 my-5 blog-content-div">
                        <h3><?php print $blog['blog_title'] ?></h3>
                            <div class="blog-content-text">
                                <p class="mt-1"><?php print $blog['blog_content'] ?></p>
                            </div>
                        <small><?php print $blog['blog_dateposted'] ?></small>
                    </div>
                </div>
            <?php

                }

            ?>
            
        </div>
<?php

require_once("partials/footer.php");

?>
    <script>
    
    $(document).ready(function(){

        $("#logout").click(function(event) {
          
          if (!confirm("Are you sure you want to log out?")) {
              event.preventDefault();
              alert("Logout canceled.");
          } else{

          }
      });


    })


      
    </script>
</body>
</html>