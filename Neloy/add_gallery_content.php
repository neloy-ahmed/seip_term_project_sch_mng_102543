<?php
$resource = $sup_obj->select_all_published_album();
if (isset($_POST['btn'])) {
    $image_check = $sup_obj->check_image($_FILES['gallery_image']['type'], $_FILES['gallery_image']['size'], $_FILES['gallery_image']['error']);

    if ($image_check == 1) {

        $message = $sup_obj->save_gallery_image($_POST, $_FILES);
    } elseif ($image_check == 0) {
        echo 'Invalid Image File !!! ';
    }
}
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Add Gallery Image</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Gallery Image</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h3 class="text-success">
            <?php
            if (isset($message)) {
                echo $message;
                unset($message);
            }
            ?>
        </h3>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Select Album Name</label>
                        <div class="controls">
                            <select id="selectError3" name="album_id">
                                <!--  <option >Select Publication Status</option>-->
                                <?php while($row = mysql_fetch_assoc($resource)) { ?>
                                
                                <option value="<?php echo $row['album_id'];?>"><?php echo $row['album_title'];?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    
                   <!-- <div class="control-group">
                        <label class="control-label" for="fileInput">Gallery Title</label>
                        <div class="controls">
                            <input type="text" name="gallery_title" class="input-file uniform_on" id="fileInput" >
                        </div>
                    </div>-->
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Gallery Image</label>
                        <div class="controls">
                            <input type="file" name="gallery_image" class="input-file uniform_on" id="fileInput" >
                        </div>
                    </div>    


                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <!--  <option >Select Publication Status</option>-->

                            <option value="1">Published</option>  
                                <option value="0">Unpublish</option>

                            </select>
                        </div>
                    </div>


                    








                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Save Image</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>  
        </div>
    </div><!--/span-->
</div>