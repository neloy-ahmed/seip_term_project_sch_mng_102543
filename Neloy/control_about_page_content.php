<?php
/*****************************************************WELCOME CONTROL STARTS******************************************/
//It will make the welcome active
if (@$_GET['status'] == 'unpublished') {
    $sup_obj->make_welcome_published($_GET['welcome_id']);
}

//It will make the welcome inactive
elseif (@$_GET['status'] == 'published') {
    $sup_obj->make_welcome_unpublished($_GET['welcome_id']);
}

$result = $sup_obj->select_all_welcome();
/*****************************************************WELCOME CONTROL ENDS******************************************/

/*=========================================================================================*/

/*****************************************************FEATURED OFFER CONTROL STARTS******************************************/
//It will make the offer active
if (@$_GET['condition'] == 'unpublished') {
    $sup_obj->make_offer_published($_GET['offer_id']);
}

//It will make the offer inactive
elseif (@$_GET['condition'] == 'published') {
    $sup_obj->make_offer_unpublished($_GET['offer_id']);
}

$result_location = $sup_obj->select_all_featured_offer();
/*****************************************************FEATURED OFFER CONTROL ENDS******************************************/
?>



<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Control About Page</a></li>
</ul>
<h2 style="color: #0000cc;">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
</h2>


<!----------------------------------*****************************************************WELCOME CONTROL STARTS******************************************---------------------------------->
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Welcome Controller</h2>
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
                        <th>Text</th>
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
                            
                            <td class="center"><img src="../php_upload/about/<?php echo $data['top_side_image'];?>" height="100" width="80"></td>
                            <td class="center"><?php echo strip_tags( $data['welcome_text'] );?></td>

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
                                    <a class="btn btn-danger" href="?status=unpublished&welcome_id=<?php echo $data['welcome_id'] ?>" title="make active"><!--you can make notice active here-->
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>

    <?php } else { ?>
                                    <a class="btn btn-success" href="?status=published&welcome_id=<?php echo $data['welcome_id'] ?>" title="make inactive"><!--you can make notice inactive here-->
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
<!----------------------------------*****************************************************WELCOME CONTROL ENDS******************************************---------------------------------->



<!----------------------------------*****************************************************FEATURED OFFER CONTROL STARTS******************************************---------------------------------->
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Featured Offer Controller</h2>
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
                        <th>Item Name</th>
                        <th>Short description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php $i = 1;
                    while ($data = mysql_fetch_assoc($result_location)) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            
                            <td class="center"><img src="../php_upload/featured_offer/<?php echo $data['item_image'];?>" height="100" width="80"></td>
                            <td class="center"><?php echo strip_tags( $data['item_name'] );?></td>
                            <td class="center"><?php echo strip_tags( $data['item_short_description'] );?></td>

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
                                    <a class="btn btn-danger" href="?condition=unpublished&offer_id=<?php echo $data['offer_id'] ?>" title="make active"><!--you can make notice active here-->
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>

    <?php } else { ?>
                                    <a class="btn btn-success" href="?condition=published&offer_id=<?php echo $data['offer_id'] ?>" title="make inactive"><!--you can make notice inactive here-->
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
<!----------------------------------*****************************************************FEATURED OFFER CONTROL ENDS******************************************---------------------------------->
