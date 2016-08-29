<?php
$result = $sup_obj->select_album_by_id($_GET['album_id']);
$album_info = mysql_fetch_assoc($result);

if(@$_GET['action']=='delete'){
     $sup_obj->delete_image_by_id($_GET['image_id'], $_GET['file_name']);
}

//we will update category information now
if (isset($_POST['btn'])) {
    $sup_obj->update_album_info($_POST, $_FILES);
}
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Edit Album</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Album</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h3 class="text-success">
            <?php/*
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }*/
            ?>
        </h3>
        <div class="box-content">
            <form class="form-horizontal" name="edit_notice_form" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Album Name</label>
                        <div class="controls">
                            <input type="text" name="album_title" class="span6 typeahead" id="typeahead" value="<?php echo $album_info['album_title'];?>" >
                            <!--<input type="hidden" name="image_id" class="span6 typeahead" id="typeahead" value="<?php// echo $album_info['image_id'];?>" >-->
                            <input type="hidden" name="album_id" class="span6 typeahead" id="typeahead" value="<?php echo $album_info['album_id'];?>" >
                        </div>
                    </div>
                    
<!--testing--------------start-->
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Photos</label>
                        <div class="controls">
                            <?php 
                                        @mysql_data_seek($result, 0);
                            while($data = mysql_fetch_assoc($result)) { ?>
                            
                            <img src="../php_upload/gallery/<?php echo $data['gallery_image'];?>" height="200" width="150">
                           <a class="btn btn-danger" href="?action=delete&image_id=<?php echo $data['image_id'] ?>&file_name=<?php echo $data['gallery_image'];?>" onclick="return check_delete();"  title="delete">
                                    <i class="halflings-icon white trash"></i> 
                           </a>
                            
                            
                            
                            
                            <?php } ?>
                        </div>
                    </div>
 <!--testing----------------end-->
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Add More Photo</label>
                        <div class="controls">
                            <input type="file" name="gallery_image" class="input-file uniform_on" id="fileInput" >
                        </div>
                    </div>

                    


   <!--                 <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                               
                                <option value="1">Published</option>
                                <option value="0">Unpublish</option>

                            </select>
                        </div>
                    </div>
                    
                    
                    -->







                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Album</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>  
        </div>
        
        <!--Form2 Start------------------------>
        
       <!-- <div class="box-content">
            <form class="form-horizontal" name="edit_notice_form2" action="" method="post">
                <fieldset>
                    
                    

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Photos</label>
                        <div class="controls">
                            <?php/* 
                                        @mysql_data_seek($result, 0);
                            while($data = mysql_fetch_assoc($result)) { */?>
                            
                            <img src="../php_upload/gallery/<?php// echo $data['gallery_image'];?>" height="200" width="150">
                           
                            <input type="hidden" name="image_id" value="<?php// echo $data['image_id']; ?>">
                            <input type="hidden" name="file_name" value="<?php// echo $data['gallery_image'];?>">
                            
                            <button class="btn btn-danger" type="submit" name="delete_img" onclick="return check_delete();"  title="delete"><i class="halflings-icon white trash"></i></button>
                            
                            <?php// } ?>
                        </div>
                    </div>
                    
                    
                    

                    


  





                    
                </fieldset>
            </form>  
        </div>  -->
        
        <!--Form2 End------------------------->
    </div><!--/span-->
</div>
<script>
    /*-------------------------------------------Showing previously selected drop-down item-------------------------------------------*/
  /*  document.forms['edit_notice_form'].elements['notice_priority'].value = '<?php //echo $notice_info['notice_priority']; ?>'
    document.forms['edit_notice_form'].elements['publication_status'].value = '<?php //echo $notice_info['publication_status']; ?>'
*/
</script>