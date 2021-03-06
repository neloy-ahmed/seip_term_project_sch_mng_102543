<?php
//It will make the notice active
if (@$_GET['status'] == 'unpublished') {
    $sup_obj->make_teacher_published($_GET['teacher_id']);
}

//It will make the notice inactive
elseif (@$_GET['status'] == 'published') {
    $sup_obj->make_teacher_unpublished($_GET['teacher_id']);
}

//this will sent category into recycle-bin
elseif (@$_GET['action'] == 'delete') {
    $sup_obj->archive_teacher($_GET['teacher_id']);
}


$result = $sup_obj->select_all_teacher();
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage Notice</a></li>
</ul>
<h2 style="color: #0000cc;">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
</h2>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Teacher</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Full Name</th>
                        <th>Photo</th>

                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php $i = 1;
                    while ($data = mysql_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="center"><?php echo $data['full_name']; ?></td>
                            <td class="center"><img src="../php_upload/teacher/<?php echo $data['grid_image']?>" height="100" width="80"></td>

                            <td class="center">
                                <?php
                                    if ($data['publication_status'] == 0) {
                                        echo '<span class="btn-danger">' .'Unpublished'. '</span>';
                                    } else {
                                        echo '<span class="btn-success">'. 'Published' . '</span>';
                                    }
                                    ?>

                                
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="view_teacher.php?teacher_id=<?php echo $data['teacher_id'] ?>" title="view details"><!--you can view notice details here-->
                                    <i class="halflings-icon white zoom-in"></i>  
                                </a>
                                
<!--**********Indicating published and unpublished notice with green sign and red sign and sending their id in GET method to change their status*******-->                        
    <?php if ($data['publication_status'] == 0) { ?>
                                    <a class="btn btn-danger" href="?status=unpublished&teacher_id=<?php echo $data['teacher_id'] ?>" title="make active"><!--you can make notice active here-->
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>

    <?php } else { ?>
                                    <a class="btn btn-success" href="?status=published&teacher_id=<?php echo $data['teacher_id'] ?>" title="make inactive"><!--you can make notice inactive here-->
                                        <i class="halflings-icon white arrow-down"></i>  
                                    </a>
    <?php } ?>

                                <a class="btn btn-info" href="edit_teacher.php?teacher_id=<?php echo $data['teacher_id'] ?>" title="edit">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?action=delete&teacher_id=<?php echo $data['teacher_id'] ?>" onclick="return check_delete();"  title="delete">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>

                        <?php $i++;
                    }
                    ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->