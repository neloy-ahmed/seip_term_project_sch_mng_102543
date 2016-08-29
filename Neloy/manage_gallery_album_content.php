<?php
//It will make a single album active and other album inactive
if (@$_GET['status'] == 'unpublished') {
    $sup_obj->make_a_single_album_published($_GET['album_id']);
}



//this will sent album into recycle-bin
elseif (@$_GET['action'] == 'delete') {
    $sup_obj->archive_notice($_GET['notice_id']);
}


$result = $sup_obj->select_all_album();
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
            <h2><i class="halflings-icon user"></i><span class="break"></span>Notice</h2>
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
                        <th>Album Name</th>

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
                            <td class="center"><?php echo $data['album_title']; ?></td>

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
                                <a class="btn btn-success" href="view_album.php?album_id=<?php echo $data['album_id'] ?>" title="view details"><!--you can view album details here-->
                                    <i class="halflings-icon white zoom-in"></i>  
                                </a>
                                
<!--**********Indicating published and unpublished album with green sign and red sign and sending their id in GET method to change their status*******-->                        
    <?php if ($data['publication_status'] == 0) { ?>
                                    <a class="btn btn-danger" href="?status=unpublished&album_id=<?php echo $data['album_id'] ?>" title="make active"><!--you can make album active here-->
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>

    <?php } else { ?>
                                    <a class="btn btn-success" href="?status=published&album_id=<?php echo $data['album_id'] ?>" title="make inactive"><!--you can make notice inactive here-->
                                        <i class="halflings-icon white arrow-down"></i>  
                                    </a>
    <?php } ?>

                                <a class="btn btn-info" href="edit_album.php?album_id=<?php echo $data['album_id'] ?>" title="edit">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?action=delete&album_id=<?php echo $data['album_id'] ?>" onclick="return check_delete();"  title="delete">
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