<?php 
$resource = $app_obj->select_all_published_slider();

?>


<div class="slides-container">
    <?php while($row = mysql_fetch_assoc($resource)) {?>
    <img src="php_upload/slider/<?php echo $row['slider_image'];?>" alt="" />
    <?php  } ?>
</div>

<div class="tint"></div>

<!-- SLIDER OFFERS START -->
<div class="slider-offers text-center">
    <ul>
        <?php mysql_data_seek($resource, 0);
                    while($row = mysql_fetch_assoc($resource)) {
                
                ?>
        <li>
            <div class="text-success"><?php echo $row['slider_text'];?></div>
        </li>
        
        <?php } ?>
        
    </ul>
</div>
<!-- SLIDER OFFERS END -->

    
<a class="arrow" href="#welcome">
    <i class="fa fa-arrow-down fa-2x"></i>
</a>