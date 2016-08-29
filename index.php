<?php

ob_start();

session_start();

require './classes/application.php';
$app_obj = new Application;
?>

<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Smartway - HTML Template">
        <meta name="author" content="Coffeecream Themes, info@coffeecream.eu">
        <title>Smartway - HTML Template</title>
        <link rel="shortcut icon" href="images/favicon.png">

        <!-- Main Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>
    <?php
    if (isset($page) == false) {
        echo '<body id="homepage">'; // The <body> tag id "homepage" is only available in the index page  
    } else {
        echo '<body >'; // Pages other than index does not contains any additional attributes  like id= 'homepage'
    }
    ?>

    <?php
    if (isset($page) == false) {
        echo '<div id="home"></div>'; //This <div> is only available in homepage
    }
    ?>
        

        <!-- ========== HEADER START ========== -->

        <header>

            <!-- ==== TOOLS START ==== -->
            <div class="tools">
                <?php 
                if(@$page != 'student_landing'){
                include './tools.php';
                }elseif($page == 'student_landing'){
                    include './student_landing_tools.php';
                }
                ?>
            </div>
            <!-- ==== TOOLS END ==== -->

            <!-- ==== NAVBAR START ==== -->
            <div class="navbar navbar-default navbar-static-top" role="navigation">
                <?php include './navbar.php';?>
            </div>
            <!-- ==== NAVBAR END ==== -->

        </header>

        <!-- ========== HEADER END ========== -->

        <!-- ========== BANNER START ========== -->

        
            <?php 
            //This section is only for homepage, it will load homepage slider. 
            if(isset($page)==false){
               echo '<div id="slides">';
                include './home_banner.php'; // Big sliding images those are only available at index page
                echo '</div>';
            }
            
            ?>
         
        <!--***************************************Each page specific banner will come here dynamically**************Start************************-->
        <?php 
        if(@$page == 'contact_content'){
                include './contact_banner.php'; //Pages other than index contains specific titles replacing the index page big sliding banner
            }
        else if(@$page == 'notice_board_content'){
                include './notice_board_banner.php';
        }
        else if(@$page == 'gallery_content'){
                include './gallery_banner.php';
        }
        else if(@$page == 'teachers_list_content'){
                include './teachers_list_banner.php';
        }
        else if(@$page == 'individual_teachers_profile'){
                include './teachers_profile_banner.php';
        }
        else if(@$page == 'news_feed_content'){
                include './news_feed_banner.php';
        }
        else if(@$page == 'about_content'){
                include './about_banner.php';
        }
        else if(@$page == 'login_content'){
                include './login_banner.php';
        }
        else if(@$page == 'login_student'){
                include './login_student_banner.php';
        }
        else if(@$page == 'full_notice'){
                include './full_notice_banner.php';
        }
        
        
        ?>
        <!--***************************************Each page specific banner will come here dynamically**************End************************-->
        
        
        <!-- ========== BANNER END ========== -->

<!--****************************ALL PAGES WILL COME HERE DYNAMICALLY*************************Start*******************-->
        <?php
            if(isset($page)==false){
                include './home_content.php';
            }
            else if($page == 'contact_content'){
                include './contact_content.php';
            }
            else if($page == 'notice_board_content'){
                include './notice_board_content.php';
            }
            else if($page == 'gallery_content'){
                include './gallery_content.php';
            }
            else if($page == 'teachers_list_content'){
                include './teachers_list_content.php';
            }
            else if($page == 'individual_teachers_profile'){
                include './individual_teachers_profile_content.php';
            }
            else if($page == 'news_feed_content'){
                include './news_feed_content.php';
            }
            else if($page == 'about_content'){
                include './about_content.php';
            }
            else if($page == 'login_content'){
                include './login_content.php';
            }
            else if($page == 'full_notice'){
                include './full_notice_content.php';
            }
            else if($page == 'teacher_landing'){
                include './teacher_landing_content.php';
            }
            else if($page == 'login_student'){
                include './login_student_content.php';
            }
            else if($page == 'student_landing'){
                include './student_landing_content.php';
            }
        
        ?>
<!--****************************ALL PAGES WILL COME HERE DYNAMICALLY**************************End******************-->

        <!-- ========== Footer Dynamic Control START ========== -->
<?php 

//This will show contact info into prefooter section
$resource = $app_obj->show_contact();
$contact_info = mysql_fetch_assoc($resource);


//This will show about page info into prefooter section
$resource_location = $app_obj->show_welcome();
$welcome_info = mysql_fetch_assoc($resource_location);

?>
        

        <!-- ========== Footer Dynamic Control END ========== -->

        <!-- ========== PREFOOTER START ========== -->

       <div id="prefooter">
           
            <div class="container">
                <div class="row">

                    <!-- ==== ABOUT START == -->
                    <div class="col-sm-6">
                        <h3>About Us</h3>
                        <div class="row">
                            <div class="col-sm-5">
                                <p><img src="php_upload/about/<?php echo $welcome_info['top_side_image']?>" alt="" class="img-responsive" /></p>
                            </div>
                            <div class="col-sm-7">
                                <p><?php echo substr(strip_tags($welcome_info['welcome_text']), 0, 300); ?><br><!-------output limited number of string------->
                                    <a href="about.php">Read More <i class="fa fa-angle-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <!-- ==== ABOUT END == -->

                    <!-- ==== QUICK LINKS START == -->
                  <div id="links">
                    <div class="col-sm-3">
                        <h3>Quick Links</h3>
                        <nav>
                            <ul>
                                <li><a href="index.php"><i class="fa fa-angle-right"></i>Home Page</a></li>
                                <li><a href="notice_board.php"><i class="fa fa-angle-right"></i>Notice Board</a></li>
                                <li><a href="gallery.php"><i class="fa fa-angle-right"></i>School Album</a></li>
                                <li><a href="teachers_list.php"><i class="fa fa-angle-right"></i>Our Teachers</a></li>
                                <li><a href="about.php"><i class="fa fa-angle-right"></i>Know Us</a></li>
                                <li><a href="contact.php"><i class="fa fa-angle-right"></i>Want our address?</a></li>
                            </ul>
                        </nav>
                        
                    </div>
                  </div>
                        
                    <!-- ==== QUICK LINKS END == -->

                    <!-- ==== CONTACT START == -->
                    <div class="col-sm-3">
                        <h3>Contact</h3>
                        <p><?php echo $contact_info['address']?></p>

                        <p><?php echo $contact_info['phone_fax']?></p>
                        <p><?php echo $contact_info['email']?></p>

                        
                    </div>
                    <!-- ==== CONTACT END == -->

                </div>
            </div>
               
        </div>

        <!-- ========== PREFOOTER END ========== -->

        <!-- ========== FOOTER START ========== -->

        <footer>
            <div class="container">
                <div class="row">

                    <!-- ==== CREDITS START == -->
                    <div class="col-sm-8">
                        &copy; <?php echo date("Y")?> Developed By Neloy Ahmed
                    </div>
                    <!-- ==== CREDITS END == -->

                    <!-- ==== SOCIAL ICONS START == -->
                    <div class="col-sm-4 text-right">
                        <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                        <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a href="#"><i class="fa fa-youtube fa-lg"></i></a>
                    </div>
                    <!-- ==== SOCIAL ICONS END == -->

                </div>
            </div>
        </footer>

        <!-- ========== FOOTER END ========== -->

        <!-- Modernizr Plugin -->
        <script src="js/modernizr.custom.97074.js"></script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.1.min.js"></script>

        <!-- Bootstrap Plugins -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Retina Plugin -->
        <script src="js/retina-1.1.0.min.js"></script>

        <!-- Superslides Plugin -->
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.animate-enhanced.min.js"></script>
        <script src="js/jquery.superslides.js"></script>

        <!-- Owl Carousel Plugin -->
        <script src="js/owl.carousel.min.js"></script>

        <!-- Parallax ImageScroll Plugin -->
        <script src="js/jquery.parallax-1.1.3.js"></script>

        <!-- Fancybox Plugin -->
        <script src="js/jquery.fancybox.js"></script>

        <!-- ImagesLoaded Plugin -->
        <script src="js/imagesloaded.pkgd.min.js"></script>

        <!-- Masonry Plugin -->
        <script src="js/masonry.pkgd.min.js"></script>

        <!-- Progressbar Plugin -->
        <script src="js/bootstrap-progressbar.js"></script>

        <!-- Scroll Reveal Plugin -->
        <script src="js/scrollReveal.js"></script>

        <!-- Magic Form Processing -->
        <script src="js/magic.js"></script>

        <!-- jQuery Settings -->
        <script src="js/settings.js"></script>

    </body>


</html>