<?php
$resource = $app_obj->select_teacher_by_id($_GET['teacher_id']);
$data = mysql_fetch_assoc($resource);

?>

<!-- ========== CONTENT START ========== -->

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="php_upload/teacher/<?php echo $data['grid_image']?>" alt="" class="img-responsive" />
            </div>
            <div class="col-sm-6">
                <h1><?php echo $data['full_name'];?></h1>
                <p><?php echo $data['teacher_profile'];?></p>
               <!-- <ul>
                    <li>Fusce iaculis ornare nunc rutrum ornare.</li>
                    <li>Proin ut placerat enim, vel venenatis urna.</li>
                    <li>Phasellus sed diam tincidunt mauris malesuada mattis et in nisl.</li>
                    <li>Quisque massa eros, molestie at mi eget, aliquam tristique eros.</li>
                    <li>Nullam aliquet placerat magna ut eleifend.</li>
                    <li>Phasellus iaculis tristique laoreet.</li>
                </ul>-->
            </div>
        </div>
    </div>
</section>

<!-- ========== CONTENT END ========== -->

