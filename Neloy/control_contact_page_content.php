<?php
/*****************************************************CONTACT PAGE CONTROL STARTS******************************************/
//It will make the teachers_top_part active
if (@$_GET['status'] == 'unpublished') {
    $sup_obj->make_contact_page_published($_GET['contact_id']);
}

//It will make the teachers_top_part inactive
elseif (@$_GET['status'] == 'published') {
    $sup_obj->make_contact_page_unpublished($_GET['contact_id']);
}

$result = $sup_obj->select_contact_page();
/*****************************************************CONTACT PAGE CONTROL ENDS******************************************/


?>



<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Control Contact Page</a></li>
</ul>
<h2 style="color: #0000cc;">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
</h2>


<!----------------------------------*****************************************************CONTACT PAGE CONTROL STARTS******************************************---------------------------------->
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Contact Page Controller</h2>
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
                        
                        <th>Photo</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
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
                            
                            <td class="center"><img src="../php_upload/contact/<?php echo $data['right_side_image'];?>" height="100" width="80"></td>
                            <td class="center"><?php echo strip_tags( $data['address'] );?></td>
                            <td class="center"><?php echo strip_tags( $data['phone_fax'] );?></td>
                            <td class="center"><?php echo strip_tags( $data['email'] );?></td>

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
                                
                                
<!--**********Indicating published and unpublished notice with green sign and red sign and sending their id in GET method to change their status*******-->                        
    <?php if ($data['publication_status'] == 0) { ?>
                                    <a class="btn btn-danger" href="?status=unpublished&contact_id=<?php echo $data['contact_id'] ?>" title="make active"><!--you can make notice active here-->
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>

    <?php } else { ?>
                                    <a class="btn btn-success" href="?status=published&contact_id=<?php echo $data['contact_id'] ?>" title="make inactive"><!--you can make notice inactive here-->
                                        <i class="halflings-icon white arrow-down"></i>  
                                    </a>
    <?php } ?>

                                
                                
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
<!----------------------------------*****************************************************CONTACT PAGE CONTROL ENDS******************************************---------------------------------->



