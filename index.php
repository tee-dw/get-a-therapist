        <?php

        error_reporting(E_ALL);
        session_start();
        require_once("partials/header.php");
        require_once("classes/Patient.php");
        require_once("classes/Therapist.php");

        $allTherapists = $therapist->get_all_therapists_for_a_spec();

        $blogs = $therapist->get_blogs();
        // print "<pre>";
        // print_r($blogs);
        // print "</pre>";

        $reviews = $patient->get_all_reviews();
        // print "<pre>";
        // print_r($reviews);
        // print "</pre>";
        // die();

        ?>
        <!-- header ends here -->
        <!-- hero starts here -->
        <div class="row">
            <div class="col-md">
                <div id="carouselFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/Carousel/carousel3.png" class="d-block w-100" alt="...">
                            <div class="overlay d-md-block"></div>
                            <div class="herotext-overlay d-md-block">
                                <div class="col my-3">
                                    <h1 class="hero-item__title">
                                        <span class="text-center text-sm-left text-md-left">You don't have to go through life <br> alone with</span> <span class="changing-text"></span>
                                    </h1>
                                </div>
                                <div class="hero-item__buttons">
                                    <a href="signup.php" class="btn btn-block d-md-inline-block btn-responsive meet-therapist-now">Meet your Therapist Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/Carousel/carousel1.png" class="d-block w-100" alt="...">
                            <div class="overlay d-md-block"></div>
                            <div class="herotext-overlay d-md-block">
                                <div class="col my-3">
                                    <h1 class="hero-item__title">
                                        <span class="text-center text-sm-left text-md-left">You don't have to go through life <br> alone with</span> <span class="changing-text"></span>
                                    </h1>
                                </div>
                                <div class="hero-item__buttons">
                                   <a href="signup.php" class="btn btn-block d-md-inline-block btn-responsive meet-therapist-now">Meet your Therapist Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/Carousel/carousel4.png" class="d-block w-100" alt="...">
                            <div class="overlay d-md-block"></div>
                            <div class="herotext-overlay d-md-block">
                                <div class="col my-3">
                                    <h1 class="hero-item__title">
                                        <span class="text-center text-sm-left text-md-left">You don't have to go through life <br> alone with</span> <span class="changing-text"></span>
                                    </h1>
                                </div>
                                <div class="hero-item__buttons my-2">
                                    <a href="signup.php" class="btn btn-block d-md-inline-block btn-responsive meet-therapist-now">Meet your Therapist Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/Carousel/carousel2.png" class="d-block w-100" alt="...">
                            <div class="overlay d-md-block"></div>
                            <div class="herotext-overlay d-md-block">
                                <div class="col my-3">
                                    <h1 class="hero-item__title">
                                        <span class="text-center text-sm-left text-md-left">You don't have to go through life <br> alone with</span> <span class="changing-text"></span>
                                    </h1>
                                </div>
                                <div class="hero-item__buttons">
                                    <a href="signup.php" class="btn btn-block d-md-inline-block btn-responsive meet-therapist-now">Meet your Therapist Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- hero ends here -->
        <!-- Content begins here -->
        <div class="row">
            <div class="col-md content-div">
                <h1 class="content-text">You are <span class="content-text-span">Home!</span></h1>
                <hr class="content-hr">
                <div class="col-md content-para">
                    <p class="para">Here, we understand that mental health is a crucial aspect of overall well-being. We are here to provide a safe and supportive space where you can have easy access to explore, learn, and find the resources you need on your journey to mental wellness.</p>
                    <p class="para">Whether you're looking for information, coping strategies, or simply someone to talk to, you are not alone. <b>"Get a Therapist"</b> will help you find the right Therapist that will walk you through your challenges.</p>            
                    <p class="para">Remember, reaching out for help is a sign of strength. Welcome Home.</p>
                </div>
                <hr class="content-hr">
                <figure class="text-center">
                    <blockquote class="blockquote">
                      <p>"There is <strong style="color:#EC993D";>hope</strong>, even when your brain tells you there isn't."</p>
                    </blockquote>
                    <figcaption class="blockquote-footer"><u>John Green</u></figcaption>
                </figure>
            </div>
        </div>
        <!-- Content ends here -->
        <!-- Categories begins here -->
        <div class="row">
            <div class="col m-auto categories-div">
                <h3 class="categories-heading">Top Therapy Specializations</h3>
                <hr class="w-100">
                <div class="row row-cols-1 row-cols-md-5 g-4 mt-5">
                    <div class="col text-center spec_card" id="addiction">
                        <div class="card">
                            <img src="assets/images/categories_specialization/addiction.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Addiction Therapy</h5>                               
                            </div>
                        </div>
                    </div>
                    <div class="col text-center spec_card" id="child">
                        <div class="card">
                        <img src="assets/images/categories_specialization/child.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Child Therapy</h5>   
                            </div>
                        </div>
                    </div>
                    <div class="col text-center spec_card" id="clinical">
                        <div class="card">
                        <img src="assets/images/categories_specialization/clinical.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Clinical Therapy</h5>                               
                            </div>
                        </div>
                    </div>
                    <div class="col text-center spec_card" id="couple">
                        <div class="card">
                        <img src="assets/images/categories_specialization/couple.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Couple Therapy</h5>                           
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                        <img src="assets/images/categories_specialization/trauma.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="signup.php" class="btn btn-primary btn-sm" >See more</a>                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories ends here -->
        <!-- How it works begins here -->
        <div class="row text-center how-it-works-div">
            <h3 class="how-it-works-heading">How it Works</h3>
            <hr class="my-4 w-100" style="color: #14467c;">
            <div class="col-md d-flex">
                <div class="col-md-6 how-it-works-image-div">
                    <img src="assets/images/how_it_works/create_your_account.png" alt="" style="width:80%;" class="animate__animated animate__slideInUp">
                </div>
                <div class="col-md-6">
                    <div class="col-md-10 how-it-works-text-div mx-auto animate__animated animate__slideInUp">
                        <h3 class="how-it-works-text-heading">Create <i><span class="how-it-works-text-heading-span">your</span></i> Account</h3>
                        <hr class="my-4">
                        <p class="how-it-works-text-content">Gain access to your Therapist by creating your personal account. Remember, reaching out for help is a sign of strength.</p>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-2 how-it-works-arrow-div mx-auto animate__animated animate__slideInUp">
                    <img src="assets/images/how_it_works/arrow.png" alt="" style="width:100%" class="animate__animated animate__slideInUp">
                </div>
            </div>
            <div class="col-md d-flex">
                <div class="col-md-6 how-it-works-image-div">
                    <img src="assets/images/how_it_works/book_your_session.png" alt="" style="width:80%;" class="animate__animated animate__slideInUp">
                </div>
                <div class="col-md-6">
                    <div class="col-md-10 how-it-works-text-div mx-auto animate__animated animate__slideInUp">
                        <h3 class="how-it-works-text-heading">Book <i><span class="how-it-works-text-heading-span">your</span></i> Session</h3>
                        <hr class="my-4">
                        <p class="how-it-works-text-content">Begin your wellness journey by booking a session with your selected Therapist. Remember, the best way out is always through.</p>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-2 how-it-works-arrow-div mx-auto">
                    <img src="assets/images/how_it_works/arrow.png" alt="" style="width:100%" class="animate__animated animate__slideInUp">
                </div>
            </div>
            <div class="col-md d-flex">
                <div class="col-md-6 how-it-works-image-div">
                    <img src="assets/images/how_it_works/receive_your_theraphy.png" alt="" style="width:80%;" class="animate__animated animate__slideInUp">
                </div>
                <div class="col-md-6">
                    <div class="col-md-10 how-it-works-text-div mx-auto animate__animated animate__slideInUp">
                        <h3 class="how-it-works-text-heading">Receive <i><span class="how-it-works-text-heading-span">your</span></i> Therapy</h3>
                        <hr class="my-4">
                        <p class="how-it-works-text-content">Enrich your wellbeing by engaging with your Therapist in your sessions however you feel comfortable — text, chat, phone, or live. Remember, nothing can dim the light that shines from within.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- How it works ends here -->
        <!-- Featured Therapists begins here -->
        <div class="row text-center featured-therapists-section">
            <h3 class="featured-therapist-heading">Our Featured Therapists</h3>
            <hr class="my-4 mx-auto w-100">
            <div class="container mx-auto mt-3">
                <div class="col-md-10 mx-auto d-flex featured-therapist-col">
                <?php

                    if ($allTherapists )
                        foreach($allTherapists as $therapists){

                            $divStyle = ($therapists['therapists_status'] != "Active") ? 'style="display: none;"' : '';

                ?>

                    <div class="col-md featured-therapist-div mx-3" <?php print $divStyle ?> >
                        <div class="col">
                            <img src="uploads/<?php print $therapists['therapists_profile_img']; ?>" width="100%" height="200" style="border-radius:10%">
                        </div>
                        <div class="col my-2">
                            <p><b><?php print ($therapists['therapists_fname'] . " " . $therapists['therapists_lname']); ?></b><br>
                            <span><?php print $therapists['therapistspecialization_name'] ?></span></p>
                        </div>
                    </div>

                <?php
                                        
                    }

                ?>
                </div>
            </div>   
        </div>
        <!-- <div class="row featured-therapists-section featured-therapists-section-btn">
            <a href="#" class="col-md-2 btn featured-therapists-button" type="button">See More Therapists</a>
        </div> -->
        <!-- Featured Therapists ends here -->
        <!-- Reviews begins here -->
        <div class="row">
            <div class="col reviews">
                <div id="reviews" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <?php

                        if ($reviews)
                            foreach($reviews as $review){
                        
                    ?>
                        <div class="carousel-item active patient-review">
                            <div class="col-md-6 m-auto">
                                <div class="col-md-4 patient-profile-img">
                                    <img src="uploads/<?php print $review['patients_profile_img']; ?>" alt="" width="100%" height="100%" style="border-radius:50%">
                                </div>
                            </div>
                            <hr class="my-3" style="width:200px;"/>
                            <div class="col-md-6 m-auto review-text">
                                <h6><b><?php print $review['patients_fname'] . ' ' . $review['patients_lname']; ?></b></h6>
                                <p><?php print $review['review_comment']; ?></p>
                                <small><?php print $review['review_date']; ?></small>
                            </div>
                        </div>
                    <?php
                                    
                        }
    
                    ?>
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
        <!-- Resources begins here -->
        <div class="row resources-section" id="resources">
            <h3 class="resources-section-heading">Helpful Resources</h3>
            <hr class="my-2 mx-auto w-100">

            <?php

                if ($blogs)
                foreach ($blogs as $blog){
                    $divStyle = ($blog['blog_status'] != "Active") ? 'style="display: none;"' : '';

            ?>

            <div class="row resources-section" id="resources">
                <div class="col-md d-flex p-5">
                    <div class="col-md-6 resources-img-div">
                        <img src="upload/<?php print $blog['blog_img']; ?>" width="70%" alt="">  
                    </div>
                    <div class="col-md-6 resources-caption-div">
                        <div class="resources-caption-heading">
                            <h4><b><?php print $blog['blog_title'] ?></b></h4>
                        </div>
                        <div class="resources-caption-content">
                            <p><?php print $blog['blog_caption'] ?></p>
                            <small>-<?php print $blog['therapists_fname'] . ' ' . $blog['therapists_lname'] ?>, <span><?php print $blog['therapists_professional_title'] . ', ' . $blog['therapistsqualification_name'] ?>.</span></small>
                        </div>
                    </div>
                </div>
            </div>

            <?php

                }

            ?>

        </div>
        <div class="row resources-section resources-section-btn">
            <a href="signup.php" class="col-md-2 btn resources-button" type="button">See More Posts</a>
        </div>
        <!-- Resources ends here -->
        <!-- Footer begins here -->
       
        <?php

            require_once("partials/footer.php");

        ?>
    <script>
        $(document).ready(function(){
            $('.card-img-top').mouseenter(function(){
                $(this).fadeTo(300,0.5);
                // $(".spec_card").css(0 2rem 3rem);
            })

            $('.card-img-top').mouseleave(function(){
                $(this).fadeTo(1,1);
            })
        })
        
    </script>
</body>
</html>