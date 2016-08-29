<?php
/**************----SLIDER MAKER START-----****************************/
if (isset($_POST['btn'])) {
    $image_check = $sup_obj->check_image($_FILES['slider_image']['type'], $_FILES['slider_image']['size'], $_FILES['slider_image']['error']);
    
    if($image_check == 1){
        
        $message = $sup_obj->save_slider($_POST, $_FILES );
    }elseif($image_check == 0){
        echo 'Invalid Image File !!! ';
    }
}

/**************----CLUB UPLOAD START-----****************************/
if (isset($_POST['btn_club'])) {
    $image_check = $sup_obj->check_image($_FILES['club_image']['type'], $_FILES['club_image']['size'], $_FILES['club_image']['error']);
    
    if($image_check == 1){
        
        $message = $sup_obj->save_club($_POST, $_FILES );
    }elseif($image_check == 0){
        echo 'Invalid Image File !!! ';
    }
}


/**************----PARENT'S COMMENTS UPLOAD START-----****************************/
if (isset($_POST['btn_coment'])) {
        
        $message = $sup_obj->save_comment($_POST );
}
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Make Pages</a></li>
</ul>

<!---Success message will through here-->
<h3 class="text-success">
            <?php
            if (isset($message)) {
                echo $message;
                unset($message);
            }
            ?>
 </h3>


<!-----======================SLIDER MAKER START===========================------>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Make Slider</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Slider Image</label>
                        <div class="controls">
                            <input type="file" name="slider_image" class="input-file uniform_on" id="fileInput" >
                        </div>
                    </div>
                    

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Slider Text</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="slider_text" rows="2"></textarea>
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
                        <button type="submit" name="btn" class="btn btn-primary">Save Slider</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>  
        </div>
    </div><!--/span-->
</div>

<!-----===========================SLIDER MAKER ENDS======================================------>


<!-----===========================CLUB UPLOAD STARTS======================================------>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Upload Clubs</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Club Name</label>
                        <div class="controls">
                            <input type="text" name="club_name" class="span6 typeahead" id="typeahead"  >
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Club Image</label>
                        <div class="controls">
                            <input type="file" name="club_image" class="input-file uniform_on" id="fileInput" >
                        </div>
                    </div>
                    

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Short Description</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="club_short_description" rows="2"></textarea>
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
                        <button type="submit" name="btn_club" class="btn btn-primary">Upload Club</button>
                        <button type="reset" class="btn_club">Cancel</button>
                    </div>
                </fieldset>
            </form>  
        </div>
    </div><!--/span-->
</div>

<!-----===========================CLUB UPLOAD ENDS======================================------>


<!-----===========================Parent's Comments UPLOAD STARTS======================================------>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Upload Parent's Comments</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" >
                <fieldset>
                    
                                        

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Parent's Comment</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="comments" rows="2"></textarea>
                        </div>
                    </div>

                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Comnent Poster</label>
                        <div class="controls">
                            <input type="text" name="comment_poster" class="span6 typeahead" id="typeahead"  >
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
                        <button type="submit" name="btn_coment" class="btn btn-primary">Upload Comment</button>
                        <button type="reset" class="btn_coment">Cancel</button>
                    </div>
                </fieldset>
            </form>  
        </div>
    </div><!--/span-->
</div>
<!-----===========================Parent's Comments UPLOAD ENDS======================================------>