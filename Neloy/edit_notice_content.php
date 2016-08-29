<?php
$result = $sup_obj->select_notice_by_id($_GET['notice_id']);
$notice_info = mysql_fetch_assoc($result);

//we will update category information now
if (isset($_POST['btn'])) {
    $message = $sup_obj->update_notice_info($_POST);
}
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Edit Notice</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Notice</h2>
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
            <form class="form-horizontal" name="edit_notice_form" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Notice Title</label>
                        <div class="controls">
                            <input type="text" name="notice_title" class="span6 typeahead" id="typeahead" value="<?php echo $notice_info['notice_title'];?>" >
                            <input type="hidden" name="notice_id" class="span6 typeahead" id="typeahead" value="<?php echo $notice_info['notice_id'];?>" >
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Notice Summary</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="notice_short_description" rows="2"><?php echo $notice_info['notice_short_description'];?></textarea>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Detail Notice</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="notice_long_description" rows="3"><?php echo $notice_info['notice_long_description'];?></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Notice Priority</label>
                        <div class="controls">
                            <select id="selectError3" name="notice_priority">
                              <!--  <option >Select Notice Priority</option> -->
                                <option value="1">General</option>
                                <option value="2">Important</option>
                                <option value="3">Very Important</option>

                            </select>
                        </div>
                    </div>



                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                               <!-- <option >Select Publication Status</option> -->
                                <option value="1">Published</option>
                                <option value="0">Unpublish</option>

                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Do you want to update time</label>
                        <div class="controls">
                            <select id="selectError3" name="update_time">
                               <!-- <option >Select Publication Status</option> -->
                                <option value="0">No</option>
                                <option value="1">Yes</option>

                            </select>
                        </div>
                    </div>








                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Notice</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>  
        </div>
    </div><!--/span-->
</div>
<script>
    /*-------------------------------------------Showing previously selected drop-down item-------------------------------------------*/
    document.forms['edit_notice_form'].elements['notice_priority'].value = '<?php echo $notice_info['notice_priority']; ?>'
    document.forms['edit_notice_form'].elements['publication_status'].value = '<?php echo $notice_info['publication_status']; ?>'

</script>