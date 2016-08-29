<?php
if (isset($_POST['btn'])) {
    $message = $sup_obj->save_gallery_album($_POST);
}
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Add Gallery Album</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Gallery Album</h2>
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
            <form class="form-horizontal" action="" method="post" >
                <fieldset>
                    

                    <div class="control-group">
                        <label class="control-label" for="fileInput">Album Name</label>
                        <div class="controls">
                            <input type="text" name="album_title" class="input-file uniform_on" id="fileInput" >
                        </div>
                    </div>
                    
                    
                        


                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <!--  <option >Select Publication Status</option>-->
<!-- @ToDo Here is a bug when i give user to input new album with 'publication status=published' ---
Now i've suppressed it with not giving user the privillage to input new content with published status---Need to fix this in version_2-->
                                <option value="1">Published</option>
                                <option value="0">Unpublish</option>

                            </select>
                        </div>
                    </div>


                    








                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Save Album</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>  
        </div>
    </div><!--/span-->
</div>