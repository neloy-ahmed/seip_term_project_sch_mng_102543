<?php 

/**************----Contact Page-----****************************/
if (isset($_POST['btn'])) {
    $image_check = $sup_obj->check_image($_FILES['right_side_image']['type'], $_FILES['right_side_image']['size'], $_FILES['right_side_image']['error']);
    
    if($image_check == 1){
        
        $message = $sup_obj->save_contact($_POST, $_FILES );
    }elseif($image_check == 0){
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
    <li><a href="#">Make Contact</a></li>
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


<!-----======================Contact Details MAKER START===========================------>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Contact Details Maker</h2>
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
                        <label class="control-label" for="fileInput">Right Side Image</label>
                        <div class="controls">
                            <input type="file" name="right_side_image" class="input-file uniform_on" id="fileInput" >
                        </div>
                    </div>
                    

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Address</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="address" rows="2"></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Phone & Fax</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="phone_fax" rows="2"></textarea>
                        </div>
                    </div>
                    
                    
                  <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Email</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="email" rows="2"></textarea>
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
                        <button type="submit" name="btn" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>  
        </div>
    </div><!--/span-->
</div>

<!-----===========================Contact details MAKER ENDS======================================------>
