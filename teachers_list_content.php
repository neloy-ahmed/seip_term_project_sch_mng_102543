<?php 

//this will show teachers top
$resource = $app_obj->show_teachers_top();
$teachers_top_info = mysql_fetch_assoc($resource);

//this will show all teacher
$resource_location = $app_obj->select_all_published_teacher();

?>

<!-- ========== CONTENT START ========== -->

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="video-wrapper">
                    <img  src="php_upload/teacher/top_side/<?php echo $teachers_top_info['top_side_image']?>" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-6">
                <?php echo $teachers_top_info['top_side_text'];?>
            </div>
        </div>
    </div>
</section>

<!-- ========== CONTENT END ========== -->

<!-- ========== TEACHERS START ========== -->

<section id="teachers" class="alt-background">
    <div class="container">

        <h2>Teachers</h2>

        <ul class="teachers">
<?php while($row = mysql_fetch_assoc($resource_location)) { ?>
            <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="php_upload/teacher/<?php echo $row['grid_image']; ?>" alt="" class="img-responsive" />
                <div class="description">
                    <h3><?php echo $row['full_name'];?></h3>
                    <p><?php echo $row['grid_summary']?></p>
                    <a href="teachers_profile.php?teacher_id=<?php echo $row['teacher_id']?>">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </li>

<?php } ?>            

            

            

           <!-- <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="images/sidebar-post5.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Charles Turner</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers_profile.php">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </li>

            <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="images/sidebar-post6.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Laura Collins</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers_profile.php">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </li>

            <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="images/sidebar-post7.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Carolyn Butler</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers_profile.php">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </li>

            <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="images/sidebar-post8.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Christopher Wright</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers_profile.php">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </li>

            <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="images/sidebar-post9.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Lois Davis</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers_profile.php">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </li>

            <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="images/sidebar-post1.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Scott Edwards</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers_profile.php">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </li>

            <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="images/sidebar-post2.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Irene Morris</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers_profile.php">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </li>

            <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="images/sidebar-post3.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3>Ronald Brown</h3>
                    <p>Non ipsum vulputate condimentum eu id tellus. Praesent commodo arcu quis rhoncus porttitor.</p>
                    <a href="teachers_profile.php">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </li>  -->

        </ul>

    </div>
</section>

<!-- ========== TEACHERS END ========== -->

<!-- ========== SKILLS START ========== -->
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------
<section id="skills">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Our key skills</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu tellus ipsum. Nunc maximus sapien ac dui vulputate tincidunt. Morbi luctus nisi vel suscipit volutpat. Donec vitae auctor nisl. Ut malesuada felis in erat rutrum ultrices. Fusce iaculis ornare nunc rutrum ornare. Proin ut placerat enim, vel venenatis urna. Phasellus sed diam tincidunt mauris malesuada mattis et in nisl. Quisque massa eros, molestie at mi eget, aliquam tristique eros. Nullam aliquet placerat magna ut eleifend. Phasellus iaculis tristique laoreet.Donec vitae auctor nisl. Ut malesuada felis in erat rutrum ultrices. Fusce iaculis ornare nunc rutrum ornare. Proin ut placerat enim, vel venenatis urna. Phasellus sed diam tincidunt mauris malesuada mattis et in nisl. Quisque massa eros, molestie at mi eget, aliquam tristique eros.</p>
            </div>
            <div class="col-sm-6">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" data-transitiongoal="90">
                        <span class="pull-left">Progresssive Web Design</span>
                        <span class="pull-right">90%</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" data-transitiongoal="100">
                        <span class="pull-left">HTML5</span>
                        <span class="pull-right">100%</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" data-transitiongoal="80">
                        <span class="pull-left">CSS3</span>
                        <span class="pull-right">80%</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" data-transitiongoal="70">
                        <span class="pull-left">jQuery</span>
                        <span class="pull-right">70%</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" data-transitiongoal="80">
                        <span class="pull-left">Online Marketing</span>
                        <span class="pull-right">80%</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" data-transitiongoal="90">
                        <span class="pull-left">SEO</span>
                        <span class="pull-right">90%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- ========== SKILLS END ========== -->