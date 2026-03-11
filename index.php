<!--======================================================
    File Name   : index.php
    Project     : Geek Infotech
    Description : Home Page   
    Developed By: Rajat Kumar Swain
    Date Created: 30-10-2025
    Last Updated: <?php echo date("d-m-Y"); ?>
    Note         : This page defines the Home of Geek Infotech.
=======================================================-->
<?php include_once("optimize.php"); ?> 

<!DOCTYPE html>

<html lang="en">
    
<head>
    
    <!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-QNFDM2JJPR"></script>
	<script>
  	window.dataLayer = window.dataLayer || [];
  	function gtag(){dataLayer.push(arguments);}
  	gtag('js', new Date());

  	gtag('config', 'G-QNFDM2JJPR');
	</script>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile viewport optimized -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Meta Tags - SEO Optimized (No Cloud Topics) -->
    <meta name="description" content="Geek Infotech provides industry-ready IT training in Data Engineering, SQL, PL/SQL, Python, and Data Pipeline Development. We focus on practical, 									project-based learning and career growth.">
    <meta name="keywords" content="Geek Infotech, data engineering training, SQL course, PL/SQL, Python programming, database development, data pipeline, data integration, ETL, IT 									   institute in Odisha, professional IT courses, software training center">
    <meta name="author" content="Rajat Kumar Swain - Geek Infotech Team">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    
    <meta name="google-site-verification" content="OGgJ7KmPRD0COB1O_mPOFuZHO5a6rfkTo6akCVd-mk4">
    <!---site-verification=OGgJ7KmPRD0COB1O_mPOFuZHO5a6rfkTo6akCVd-mk4-->
         

    <!-- Website Title -->
    <title>Geek Infotech | Data Engineering & Database Development Training</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,700,800|Varela+Round" rel="stylesheet">

    <!-- CSS links -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<link rel="preconnect" href="https://chatling.ai"> <!--GeekNova chatbot faster -->
    
    <?php include __DIR__ . '/schema.php'; ?>  <!-- for Better Search Engine -->
	
</head>

<body>
    
  <?php include('datetime.php'); ?>  
   
    <!-- =============== Start of Header 1 Navigation =============== -->
    
    <?php include 'header.php'; ?>

    <!-- =============== End of Header 1 Navigation ================= -->




    <!-- ========== Start of Main Slider Section ========== -->
    <section class="main2">

        <!-- ===== Start of Swiper Slider ===== -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide overlay-black" style="background: url('images/index/homeslider_1.png'); background-size: cover; background-position: 50% 50%;">                 
                    <div class="slider-content container">
                        <div class="col-md-6 col-md-offset-6 col-xs-12 text-center">
                            <div class="section-title">
                                <h2 class="text-white">GEEK INFOTECH</h2>
                            </div>
                            <p class="text-white">At Geek Infotech, we believe in not only training you, but also helping you find your job. Our placement cell provides</p>
                        </div>
                    </div>
                </div>
                <!-- End of Slide 1 -->


                <!-- Start of Slide 2 -->
                <div class="swiper-slide overlay-black" style="background: url('images/index/homeslide22.jpg'); background-size: cover; background-position: 50% 50%;">
                    <div class="slider-content container">
                        <div class="col-md-6 col-xs-12 text-center">
                            <div class="section-title">
                                <h2 class="text-white">your career start now!</h2>
                            </div>
                            <p class="text-white">The World is Beaming with Technological Innovation. GEEK INFOTECH Train Students to Keep Pace with the Advancement.</p>
                        </div>
                    </div>
                </div>
                <!-- End of Slide 2 -->


            </div>
            <!-- End of Swiper Wrapper -->

            <!-- Navigation Buttons -->
            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
            <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>

        </div>
        <!-- ===== End of Swiper Slider ===== -->

    </section>
    <!-- ========== End of Main Slider Section ========== -->




    <!-- ===== Start of Popular Categories Section ===== -->
    <section class="shop ptb80 ">
        <div class="container  style= background: linear-gradient(135deg, #e0f7ff, #b3e5fc);">

            <!-- Start of Row -->
            <div class="row">
                <!-- Start of Product Wrapper -->
                <div class="col-md-12 product-wrapper">
                    <!-- ===== Start of Row ===== -->
                    <div class="row">
                        <!-- Start of First Column -->
                        <div class="col-md-6">
                            <!-- ===== Start of Owl Slider ===== -->
                            <div class="owl-carousel product-slider">
                                <!-- Owl Item -->
                                <div class="item">
                                    <div>
                                        <img src="images/bodyp1.png" alt="" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                            <!-- ===== End of Owl Slider ===== -->
                            <!-- ===== added by Rajat KUmar Static Image Below Slider ===== -->
							<div style="margin-top:10px;">
    							<img src="images/bodyp2.png" alt="Additional Image" class="img-responsive">
							</div>
                            <!-- ===== added by Rajat KUmar Static Image Below Slider ===== -->

                        </div>
                        <!-- End of First Column -->


                        <!-- Start of Second Column -->
                        <div class="col-md-6">

                        <!-- Start of Product Details -->
						 <div class="product-details" style="padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
    					  <h3 style="color:#007BFF; font-weight:700; margin-bottom:10px;">🏫 Welcome to GEEK INFOTECH</h3>
    					  <hr>
    					  <p style="font-style:italic; color:#000; font-size:16px; margin: 10px 0 20px 0;">" Embrace Your Inner Geek. Empower Your Future. "</p>
    									
    					  <p style="font-size:16px; line-height:1.6; color:#333;">
        					Geek Infotech is a dynamic learning hub for aspiring tech professionals.We specialize in cutting-edge IT education tailored to real-world industry needs.
						    Our programs cover web development, programming, data science, cybersecurity, and more.
							Whether you're a beginner or a career switcher, we help you build practical, job-ready skills.
                          </p>

    					  <p style="font-size:16px; line-height:1.6; color:#333;">
        					Courses are led by experienced mentors who blend theory with hands-on training.We believe in learning by doing—through projects, challenges, and 										collaboration.Our curriculum evolves with technology trends to keep you ahead of the curve.
							We foster a culture of curiosity, creativity, and continuous growth.
							At Geek Infotech, you don’t just learn—you become part of a tech-driven community.
							We prepare you not just for jobs, but for leadership in the digital age.
                           </p>
                            
                            <p style="font-size:16px; line-height:1.6; color:#333;"> Flexible learning formats and career guidance ensure every student succeeds.
								Join us to unlock your potential and shape the future of technology.
								Your journey into the world of innovation starts here.
							</p><br>

    						<h6 style="color:#007BFF; font-weight:600; margin-top:20px;">📚 GEEK INFOTECH</h6>
    						<p style="font-size:15px; line-height:1.5; color:#555;">
        					Learn. Build. Innovate.<br>
        					Your future in tech starts here.
    						</p>

    						<a href="aboutus.php" class="btn btn-blue btn-effect mt20" style="background-color:#007BFF; color:#fff; padding:10px 20px; border-radius:4px; text-										decoration:none; display:inline-block; margin-top:15px;">Learn More</a>
						</div>
						<!-- End of Product Details -->

                        </div>
                        <!-- End of Second Column -->
                    </div>
                    <!-- ===== End of Row ===== -->


                    <!-- ===== Start of Row ===== -->
                    <div class="row mt60">
                        <div class="col-md-12">
                            <h3 class="capitalize">Courses</h3> <hr>
                        </div>
                        
                        <!-- Start of Product 1 -->
                        <div class="col-md-6 col-sm-6 col-xs-12 mt40">
                            <div class="product nomargin">
                                <!-- Product Image -->
                                <div class="product-image">                                   
                                        <img src="images/bdc_1.png" class="img-responsive" alt="">                                 
                                </div>
                                <div class="product-descr">
                                    <a href="bca.php">
                                        <h5> Backend Development Courses </h5>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <!-- End of Product 1 -->

                        <!-- Start of Product 1 -->
                        <div class="col-md-6 col-sm-6 col-xs-12 mt40">
                            <div class="product nomargin">
                                <!-- Product Image -->
                                <div class="product-image">                                   
                                        <img src="images/dec_1.png" class="img-responsive" alt="">                                 
                                </div>
                                <div class="product-descr">
                                    <a href="bse.php">
                                        <h5> Data Engineering Courses </h5>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <!-- End of Product 1 -->
                        
                                             

                    </div>
                    <!-- ===== Start of Row ===== -->

                </div>
                <!-- End of Product Wrapper -->
            </div>
            <!-- End of Row -->
        </div>

    </section>




    <!-- ===== Start of Get Started Section ===== -->
    <section class="get-started ptb40">
        <div class="container">
            <div class="row ">

                <!-- Column -->
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <h3 class="text-white">Recruting Companies</h3>
                </div>
                <!-- Column -->
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <a href="#" class="btn btn-blue btn-effect">More..</a>
                </div>

            </div>
        </div>
    </section>
    <!-- ===== End of Get Started Section ===== -->





    <!-- ===== Start of Latest Job Section ===== -->
    





    <!-- ===== End of CountUp Section ===== -->





    <!-- ===== Start of Testimonial Section ===== -->
    <section class="blog-masonry ptb80">
        <div class="container">
            <div class="row blog-grid">
                
                <!-- Start of Blog Post 1 with Image Thumbnail -->
                


<!-- Database Connection Start  -->


<!-- Database Connection End  -->

 

                <!-- End of Blog Post 1 -->

   
            </div>
            <!-- End of Row -->
            
           
            
        </div>
    </section>
    <!-- ===== End of Blog Masonry Section ===== -->









    <!-- =============== Start of Footer 1 =============== -->
    


    <!-- ===== Start of Partners ===== -->
    <section class="ptb40" id="partners">
        <div class="container">
            <!-- Start of Owl Slider -->
            <div class="owl-carousel partners-slider">
                <!-- Partner Logo -->
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa1.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa2.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa3.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa4.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa5.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa6.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa7.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa8.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa9.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa10.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa11.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa12.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa13.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa14.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa15.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/rcompanies/aa16.png" alt=""></a>
                    </div>

                   
                <!-- Partner Logo -->
            </div>
            <!-- End of Owl Slider -->
        </div>
    </section>
    <!-- ===== End of Partners ===== -->





    <!-- =============== Start of Footer 1 =============== -->
       <?php include 'footer.php'; ?>
    <!-- =============== End of Footer 1 =============== -->





    <!-- ===== Start of Back to Top Button ===== -->
    <a href="#" class="back-top"><i class="fa fa-chevron-up"></i></a>
    <!-- ===== End of Back to Top Button ===== -->






    <!-- ===== All Javascript at the bottom of the page for faster page loading ===== -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/jquery.ajaxchimp.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.easypiechart.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>