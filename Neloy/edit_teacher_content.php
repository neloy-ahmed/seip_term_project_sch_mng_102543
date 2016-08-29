<?php
$resource = $sup_obj->select_teacher_by_id($_GET['teacher_id']);
$teacher_info = mysql_fetch_assoc($resource);

//we will update category information now
if (isset($_POST['btn'])) {
    $sup_obj->update_teacher_info($_POST, $_FILES);
}
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Edit Teacher</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Teacher</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h3 class="text-success">
            <?php/*
            if (isset($message)) {
                echo $message;
                unset($message);
            }*/
            ?>
        </h3>
        <div class="box-content">
            <form name="edit_teacher_form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Full Name</label>
                        <div class="controls">
                            <input type="text" name="full_name" class="span6 typeahead" id="typeahead" value="<?php echo $teacher_info['full_name'];?>" >
                            <input type="hidden" name="teacher_id" class="span6 typeahead" id="typeahead" value="<?php echo $teacher_info['teacher_id'];?>" >
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Short summary</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="grid_summary" rows="2"><?php echo $teacher_info['grid_summary'];?></textarea>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Teacher Profile</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="teacher_profile" rows="3"><?php echo $teacher_info['teacher_profile'];?></textarea>
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


                    <div class="control-group">
                        <img src="../php_upload/teacher/<?php echo $teacher_info['grid_image'];?>" height="200" width="150">
                        <label class="control-label" for="fileInput">Upload New Image</label>
                        <div class="controls">
                            <input type="file" name="grid_image" class="input-file uniform_on" id="fileInput"  >
                          <input type="hidden" name="previous_grid_image" class="input-file uniform_on" id="fileInput"  value="<?php echo $teacher_info['grid_image'];?>">
                        </div>
                    </div>








                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Teacher</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>  
        </div>
    </div><!--/span-->
</div>
<script>
    /*-------------------------------------------Showing previously selected drop-down item-------------------------------------------*/
    
    document.forms['edit_teacher_form'].elements['publication_status'].value = '<?php echo $teacher_info['publication_status']; ?>'

</script>