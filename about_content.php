<?php 

//This will show top welcome section
$resource = $app_obj->show_welcome();
$welcome_info = mysql_fetch_assoc($resource);

//This will show 2nd top featured offer section section
$resource_location = $app_obj->show_featured_offer();

//This will show parents comments
$result_location = $app_obj->select_all_published_comments();


//For V_0.5 it will show all published teacher 
//@ToDo it will show only few favourite or featured teacher
$result = $app_obj->select_all_published_teacher();

?>


<!-- ========== WELCOME START ========== -->

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="video-wrapper">
                    <img  src="php_upload/about/<?php echo $welcome_info['top_side_image']?>" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-6">
                <?php echo $welcome_info['welcome_text']?>
            </div>
        </div>
    </div>
</section>

<!-- ========== WELCOME END ========== -->

<!-- ========== OUR SERVICES START ========== -->

<section id="services" class="alt-background">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center carousel-title">Our Offer</h2>
            </div>
        </div>
        <div class="row text-center">
<?php while($data = mysql_fetch_assoc($resource_location)) {?>            
            <div class="col-sm-3">
                <p><img src="php_upload/featured_offer/<?php echo $data['item_image'];?>" alt="" /></p>
                <h3><?php echo $data['item_name'];?></h3>
                <p><?php echo $data['item_short_description']?></p>
                <!-----------------<p><a href="#" target="_blank" class="btn btn-primary">Read More</a></p> May be this button will be enabled in next version---------------------------->
            </div>
<?php } ?>
            
            
        </div>
    </div>
</section>

<!-- ========== OUR SERVICES END ========== -->

<!-- ========== REVIEWS START ========== -->

<section id="about-reviews">
    <div class="tint"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center" data-scroll-reveal>

                <h2>What Parent's Say</h2>

                
                <div class="owl-carousel">
<?php while($data = mysql_fetch_assoc($result_location)) { ?>
                    <div class="item">
                        <blockquote><?php echo $data['comments'];?><small><?php echo $data['comment_poster'];?></small></blockquote>
                    </div>
                    
<?php } ?>

                    
                   
                    
                </div>
                

            </div>
        </div>
    </div>
</section>

<!-- ========== REVIEWS END ========== -->

<!-- ========== FEATURED TEACHERS START ========== -->

<section id="featured-teachers" >
    <div class="container">

        <h2 class="carousel-title text-center">
            Featured Teachers
            <a href="teachers_list.php">Meet Our Staff</a>
        </h2>

        <!-- OWL CAROUSEL START -->
        <div class="owl-carousel">
<?php while($featured_teacher = mysql_fetch_assoc($result)) { ?>
            <div class="item">
                <img src="php_upload/teacher/<?php echo $featured_teacher['grid_image']?>" alt="" class="img-responsive" />
                <div class="description">
                    <h3><?php echo $featured_teacher['full_name']?></h3>
                    <p><?php echo $featured_teacher['grid_summary']?></p>
                    <a href="teachers_profile.php?teacher_id=<?php echo $featured_teacher['teacher_id']?>">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
<?php } ?>
            

        </div>
        <!-- OWL CAROUSEL END -->

    </div>
</section>

<!-- ========== FEATURED TEACHERS END ========== -->

<!-- ========== SKILLS START ========== -->


<!-- ========== SKILLS END ========== -->