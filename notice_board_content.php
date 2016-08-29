<?php
$resource_location = $app_obj->select_all_published_notice();
?>


<!-- ========== UPCOMING EXAMS GRID START ========== -->

<section id="exams-grid" class="alt-background">
    <div class="container">

        <ul class="exams-grid">
<?php while($row = mysql_fetch_assoc($resource_location))  {  ?>            

            <li class="col-lg-3 col-md-4 col-sm-6">
                <img src="images/course01.jpg" alt="" class="img-responsive" />
                <div class="description">
                    <h3><?php echo $row['notice_title']?></h3>
                    <ul>
                        <li><i class="fa fa-calendar"></i>Notice publication time<br/><?php echo $row['notice_publication_time']?></li>
                        <!--<li><i class="fa fa-clock-o"></i>1h 45min</li>-->
                    </ul>
                    <p><?php echo $row['notice_short_description']?></p>
                </div>
                <a href="full_notice.php?notice_id=<?php echo $row['notice_id']?>"><span>View Full Notice</span></a>
            </li>
<?php } ?>
            

        </ul>

    </div>
</section>

<!-- ========== UPCOMING EXAMS GRID END ========== -->