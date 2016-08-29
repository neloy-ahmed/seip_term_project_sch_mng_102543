<?php

$result = $sup_obj->select_album_by_id($_GET['album_id']);

?>

<table class="table table-bordered table-striped table-hover" style="width: 60%;" align='center'>
    <!--<tr>
        <th>Album Id</th>
        <td><?php //echo $data['teacher_id']; ?></td>
    </tr>-->
    
    <tr>
        <th>Album Name</th>
        <td><?php 
        $data = mysql_fetch_assoc($result);
        echo $data['album_title']; ?></td>
    </tr>
    
    <tr>
        <th>Photo</th>
        <td>
            <?php @mysql_data_seek($result, 0);
                        while($data = mysql_fetch_assoc($result)) {
            ?>
            <img src="../php_upload/gallery/<?php echo $data['gallery_image']?>" height="200" width="150">
            
            <?php } ?>
        
        </td>
    </tr>
    
    
    
    <tr>
        <th>Publication Status</th>
        <td><?php
        @mysql_data_seek($result, 0);
        $data = mysql_fetch_assoc($result);
            if ($data['publication_status'] == 1) {
                echo "Published";
            } else {
                echo "Unpublished";
            }
         
         
            ?>
        </td>
    </tr>  
    
</table>