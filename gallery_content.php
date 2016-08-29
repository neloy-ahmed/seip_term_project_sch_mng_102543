<?php
$resource_location = $app_obj->show_gallery();
?>

<!-- ========== CONTENT START ========== -->

<section id="content">
    <div class="container">
        <ul class="gallery">
            <?php if(gettype($resource_location) == "resource"  ) {?>
            
            <!--This block will only execute if the $resource_location contains resource------------------------------START------------------------------>
            <?php $data = mysql_fetch_assoc($resource_location); //As i am using mysql_fetch_assoc function once so if i need to use it again then i will need to set the internal data pointer at the beigining with mysql_data_seek() function ?>
            <h2><?php echo $data['album_title']; //index 5?></h2>
            <hr/>
            <?php mysql_data_seek($resource_location, 0);//with mysql_data_seek function i am setting back the internal data pointer back to starting point agin, which is row 0---
            while($data = mysql_fetch_assoc($resource_location)) { 
            ?>
            <li class="col-sm-4 col-xs-6">
                <a href="php_upload/gallery/<?php echo $data['gallery_image'];?>" class="fancybox" data-fancybox-group="group">
                    <img src="php_upload/gallery/<?php echo $data['gallery_image'];?>" class="img-responsive" alt="" />
                </a>
            </li>
            
            <?php } ?>
            <!--This block will only execute if the $resource_location contains resource------------------------------END----------------------->
            
            <?php }  //gettype end here?>
            
            
            
            
            
            
            
            
        </ul>
    </div>
</section>

<!-- ========== CONTENT END ========== -->