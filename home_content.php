<?php 
//This will select all active club bellow the slider
$resource = $app_obj->select_all_published_club();

//This will show 3 latest notice in homepage
$result = $app_obj->show_recent_notice();

//For V_0.5 it will show all published teacher 
//@ToDo it will show only few favourite or featured teacher
$resource_location = $app_obj->select_all_published_teacher();

//This will show parents comments
$result_location = $app_obj->select_all_published_comments();

?>


<!-- ========== WELCOME START ========== -->

<section id="welcome">
    <div class="container">
        <div class="row text-center">
            <?php while($row = mysql_fetch_assoc($resource)) {?>
            <div class="col-sm-3">
                <p><img src="php_upload/club/<?php echo $row['club_image'];?>" alt="" /></p>
                <h3><?php echo $row['club_name']?></h3>
                <p><?php echo $row['club_short_description'];?></p>
                <!--<p><a href="#" target="_blank" class="btn btn-primary">Read More</a></p>-->
            </div>
            <?php } ?>
            
            
        </div>
    </div>
</section>

<!-- ========== WELCOME END ========== -->

<!-- ========== RECENT NOTICE START ========== -->

<section id="featured-posts" class="alt-background"><!--remains-->
    <div class="container"><!--remains-->

        <h2 class="text-center carousel-title">
            Recent Notice
            <a href="notice_board.php">View All</a>
        </h2>

        <!-- OWL CAROUSEL START -->
        <!--not remain-->
            
<!------------------------------Test start------------------------------------------------------------------------->
            <ul class="exams-grid">
<?php while($data = mysql_fetch_assoc($result))  {  ?>            

            <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="images/course01.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3><?php echo $data['notice_title']?></h3>
                    <ul>
                        <li><i class="fa fa-calendar"></i>Notice publication time<br/><?php echo $data['notice_publication_time']?></li>
                        <!--<li><i class="fa fa-clock-o"></i>1h 45min</li>-->
                    </ul>
                    <p><?php echo $data['notice_short_description']?></p>
                </div>
                <a href="full_notice.php?notice_id=<?php echo $data['notice_id']?>"><span>View Full Notice</span></a>
            </li>
<?php } ?>
            

        </ul>
    
  
        
        <!-------------------test ends---------------------------->
           <!--------------------- 
            
                        ----------------->

        
        <!-- OWL CAROUSEL END -->

    </div>
</section>

<!-- ========== RECENT NOTICE END ========== -->

<!-- ========== SEARCH START ========== -->
<!----------------------@ToDo Try To add search here

<section id="search">
    <div class="tint"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center" data-scroll-reveal>

                <h2 class="carousel-title">
                    Search for Courses
                    <a href="courses-list-right-sidebar.html">View All Courses</a>
                </h2>

                <form class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="input-keywords">Keywords</label>
                        <input type="text" class="form-control input-lg" id="input-keywords" placeholder="Keywords">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Search</button>
                </form>

            </div>
        </div>
    </div>
</section>
-------------------->
<!-- ========== SEARCH END ========== -->

<!-- ========== FEATURED TEACHERS START ========== -->

<section id="featured-teachers" >
    <div class="container">

        <h2 class="carousel-title text-center">
            Featured Teachers
            <a href="teachers_list.php">Meet Our Staff</a>
        </h2>

        <!-- OWL CAROUSEL START -->
        <div class="owl-carousel">
<?php while($featured_teacher = mysql_fetch_assoc($resource_location)) { ?>
            <div class="item">
                <img src="php_upload/teacher/<?php echo $featured_teacher['grid_image']?>" alt="" class="img-responsive" />
                <div class="description">
                    <h3><?php echo $featured_teacher['full_name']?></h3>
                    <p><?php echo $featured_teacher['grid_summary']?></p>
                    <a href="teachers_profile.php?teacher_id=<?php echo $featured_teacher['teacher_id']?>">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
<?php } ?>
            
<!------------------------------            
            <div class="item">
                <img src="images/sidebar-post2.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Judy Williams</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers-profile.html">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>

            <div class="item">
                <img src="images/sidebar-post3.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Jerry Ramirez</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers-profile.html">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>

            <div class="item">
                <img src="images/sidebar-post4.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Daniel Roberts</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers-profile.html">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>

            <div class="item">
                <img src="images/sidebar-post5.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Charles Turner</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers-profile.html">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
---------------------------------------------------->
        </div>
        <!-- OWL CAROUSEL END -->

    </div>
</section>

<!-- ========== FEATURED TEACHERS END ========== -->

<!-- ========== POPULAR COURSES START ========== -->
<!------------------------------
<section id="popular-courses">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="carousel-title">
                    Popular Courses
                    <a href="courses-list-right-sidebar.html">View All Courses</a>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><a href="courses-details-right-sidebar.html"><img src="images/popular1.jpg" alt="" class="img-responsive" /></a></p>
            </div>
            <div class="col-sm-4">
                <p><a href="courses-details-right-sidebar.html"><img src="images/popular2.jpg" alt="" class="img-responsive" /></a></p>
            </div>
            <div class="col-sm-4">
                <p><a href="courses-details-right-sidebar.html"><img src="images/popular3.jpg" alt="" class="img-responsive" /></a></p>
            </div>
        </div>
    </div>
</section>
----------------------------------------------->

<!-- ========== POPULAR COURSES END ========== -->

<!-- ========== REVIEWS START ========== -->

<section id="about-reviews">
    <div class="tint"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center" data-scroll-reveal>

                <h2>What Parent's Say</h2>

                <!-- OWL CAROUSEL START -->
                <div class="owl-carousel">
<?php while($data = mysql_fetch_assoc($result_location)) { ?>
                    <div class="item">
                        <blockquote><?php echo $data['comments'];?><small><?php echo $data['comment_poster'];?></small></blockquote>
                    </div>
                    
<?php } ?>

                    
                   <!------------------------ 
                    <div class="item">
                        <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper consectetur nunc ac pretium. Nullam vel lectus non augue imperdiet porta. Proin commodo malesuada faucibus. Integer at lacinia lacus. Vestibulum dignissim imperdiet est vel ornare. Sed vehicula luctus massa, sit amet porta purus feugiat a. Cras tincidunt neque vitae enim pellentesque, nec congue mauris suscipit. Praesent sit amet odio lacus. <small>Malcolm Carr, Student</small></blockquote>
                    </div>

                    <div class="item">
                        <blockquote>Integer faucibus orci eu lorem vulputate, non semper odio consectetur. Phasellus eu commodo lectus, interdum molestie nunc. Maecenas aliquet sagittis elementum. Nulla lobortis diam nisl, id consectetur nunc faucibus viverra. Donec vel porta augue, eget accumsan lorem. Sed dictum consequat ipsum eget porta. Donec imperdiet dolor at ante interdum, sed viverra orci iaculis. Donec vestibulum nulla at tortor molestie, vel convallis neque vestibulum. Phasellus luctus purus ut tincidunt imperdiet. <small>Antonia Owen, Student</small></blockquote>
                    </div>

                    <div class="item">
                        <blockquote>Vestibulum viverra dolor lorem, vitae ornare velit facilisis eget. Phasellus ornare, mauris id interdum cursus, velit libero dictum dolor, a vehicula lacus enim id tortor. Vestibulum faucibus nec elit id iaculis. Aenean lorem ante, pretium ac iaculis non, tincidunt in quam. Nunc lobortis dictum dui. Pellentesque sagittis luctus posuere. Sed suscipit mi vitae orci accumsan, ut imperdiet odio molestie. <small>Jared Murray, Student</small></blockquote>
                    </div>

                    --------------------------------->
                    
                </div>
                <!-- OWL CAROUSEL END -->

            </div>
        </div>
    </div>
</section>

<!-- ========== REVIEWS END ========== -->

<!-- ========== RECENT BLOG POSTS START ========== -->
<!-----------------------------------------------------------------------------------------------------------------------------------------------------@ToDo I will try to add teacher post then i will add this section
<section id="recent-posts">
    <div class="container">

        <h2 class="text-center carousel-title">
            Recent Blog Posts
            <a href="blog-list-right-sidebar.html">View All</a>
        </h2>

        <!-- OWL CAROUSEL START -->
<!------------------------------------------------------------------------------------------------------------------------------------------------------@ToDo I will try to add teacher post then i will add this section
        <div class="owl-carousel">

            <div class="item">
                <div class="post row" data-scroll-reveal>
                    <div class="col-md-4">
                        <a href="#"><img src="images/sidebar-post1.jpg" alt="" class="img-responsive" /></a>
                        <div class="post-date">
                            <div class="post-day">28</div>
                            <div class="post-month">Sep</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3><a href="#">Morbi nec quam sed elit pharetra</a></h3>
                        <div class="meta">
                            <span><i class="fa fa-user"></i><a href="#">John Doe</a></span>
                            <span><i class="fa fa-tags"></i><a href="#">Chat</a>, <a href="#">Video</a></span>
                            <span><i class="fa fa-comments"></i><a href="#">24</a></span>
                        </div>
                        <p class="intro">Praesent dui diam, vestibulum id mi at, iaculis accumsan ligula. Vivamus erat ligula, condimentum quis congue posuere, posuere id nisi. Pellentesque tempor sit amet arcu in mattis. Nullam congue, lectus vitae ultrices interdum, augue nibh lacinia ante, et tempus arcu tellus quis ligula. Aliquam congue ex vitae turpis fermentum, ac tempor nisi commodo. Ut ante turpis, pulvinar eu arcu eu, blandit blandit sapien. Proin sagittis nibh lectus, lobortis ultrices.<br>
                            <a href="#">Read More <i class="fa fa-angle-right"></i></a></p>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="post row" data-scroll-reveal>
                    <div class="col-md-4">
                        <a href="#"><img src="images/sidebar-post2.jpg" alt="" class="img-responsive" /></a>
                        <div class="post-date">
                            <div class="post-day">23</div>
                            <div class="post-month">Sep</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3><a href="#">Morbi nec quam sed elit pharetra</a></h3>
                        <div class="meta">
                            <span><i class="fa fa-user"></i><a href="#">John Doe</a></span>
                            <span><i class="fa fa-tags"></i><a href="#">Chat</a>, <a href="#">Video</a></span>
                            <span><i class="fa fa-comments"></i><a href="#">24</a></span>
                        </div>
                        <p class="intro">Praesent dui diam, vestibulum id mi at, iaculis accumsan ligula. Vivamus erat ligula, condimentum quis congue posuere, posuere id nisi. Pellentesque tempor sit amet arcu in mattis. Nullam congue, lectus vitae ultrices interdum, augue nibh lacinia ante, et tempus arcu tellus quis ligula. Aliquam congue ex vitae turpis fermentum, ac tempor nisi commodo. Ut ante turpis, pulvinar eu arcu eu, blandit blandit sapien. Proin sagittis nibh lectus, lobortis ultrices.<br>
                            <a href="#">Read More <i class="fa fa-angle-right"></i></a></p>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="post row" data-scroll-reveal>
                    <div class="col-md-4">
                        <a href="#"><img src="images/sidebar-post3.jpg" alt="" class="img-responsive" /></a>
                        <div class="post-date">
                            <div class="post-day">14</div>
                            <div class="post-month">Sep</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3><a href="#">Morbi nec quam sed elit pharetra</a></h3>
                        <div class="meta">
                            <span><i class="fa fa-user"></i><a href="#">John Doe</a></span>
                            <span><i class="fa fa-tags"></i><a href="#">Chat</a>, <a href="#">Video</a></span>
                            <span><i class="fa fa-comments"></i><a href="#">24</a></span>
                        </div>
                        <p class="intro">Praesent dui diam, vestibulum id mi at, iaculis accumsan ligula. Vivamus erat ligula, condimentum quis congue posuere, posuere id nisi. Pellentesque tempor sit amet arcu in mattis. Nullam congue, lectus vitae ultrices interdum, augue nibh lacinia ante, et tempus arcu tellus quis ligula. Aliquam congue ex vitae turpis fermentum, ac tempor nisi commodo. Ut ante turpis, pulvinar eu arcu eu, blandit blandit sapien. Proin sagittis nibh lectus, lobortis ultrices.<br>
                            <a href="#">Read More <i class="fa fa-angle-right"></i></a></p>
                    </div>
                </div>
            </div>

        </div>
        <!-- OWL CAROUSEL END -->
<!------------------------------------------------------------------------------------------------------------------------------------------------------@ToDo I will try to add teacher post then i will add this section
    </div>
</section>
-@ToDo I will try to add teacher post then i will add this section
---------------------------------------------------------------------------------------------------------------------------------->

<!-- ========== RECENT BLOG POSTS END ========== -->

<!-- ========== NEWSLETTER START ========== -->
<!----------------------*****************************@ToDo May be add Newsletter in next version
<section id="newsletter">
    <div class="tint"></div>
    <div class="container">
        <div class="row text-center" data-scroll-reveal>
            <div class="col-md-12">
                <h2>Newsletter</h2>
            </div>
        </div>
        <form class="form-inline" role="form" name="newsletter-form" id="newsletter-form" action="http://coffeecreamthemes.com/themes/smartway/site/process-newsletter.php">
            <div class="row" data-scroll-reveal>
                <div class="col-sm-4 text-center" data-scroll-reveal>
                    <div class="form-group" id="newsletter-name-group">
                        <label class="sr-only" for="newsletter-input-name">Your name</label>
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" id="newsletter-input-name" placeholder="Name">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-center" data-scroll-reveal>
                    <div class="form-group" id="newsletter-email-group">
                        <label class="sr-only" for="newsletter-input-email">Your email</label>
                        <div class="input-group">
                            <input type="email" class="form-control input-lg" id="newsletter-input-email" placeholder="Email">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-center" data-scroll-reveal>
                    <button type="submit" class="btn btn-lg btn-primary">Subscribe</button>
                </div>
            </div>
        </form>
    </div>
</section>

@ToDo May be add Newsletter in next version***********************************-------------------->
<!-- ========== NEWSLETTER END ========== -->