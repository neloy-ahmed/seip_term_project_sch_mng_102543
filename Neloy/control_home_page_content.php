<?php
/*****************************************************SLIDER CONTROL STARTS******************************************/
//It will make the notice active
if (@$_GET['status'] == 'unpublished') {
    $sup_obj->make_slider_published($_GET['slider_id']);
}

//It will make the notice inactive
elseif (@$_GET['status'] == 'published') {
    $sup_obj->make_slider_unpublished($_GET['slider_id']);
}

$result = $sup_obj->select_all_slider();
/*****************************************************SLIDER CONTROL ENDS******************************************/

/*====================================================================================*/

/*****************************************************CLUB CONTROL STARTS******************************************/
//It will make the notice active
if (@$_GET['condition'] == 'unpublished') {
    $sup_obj->make_club_published($_GET['club_id']);
}

//It will make the notice inactive
elseif (@$_GET['condition'] == 'published') {
    $sup_obj->make_club_unpublished($_GET['club_id']);
}

$resource = $sup_obj->select_all_club();
/*****************************************************CLUB CONTROL ENDS******************************************/


/*====================================================================================*/

/*****************************************************PARENTS COMMENTS CONTROL STARTS******************************************/
//It will make the notice active
if (@$_GET['state'] == 'unpublished') {
    $sup_obj->make_comments_published($_GET['comments_id']);
}

//It will make the notice inactive
elseif (@$_GET['state'] == 'published') {
    $sup_obj->make_comments_unpublished($_GET['comments_id']);
}

$result_location = $sup_obj->select_all_comments();
/*****************************************************PARENTS COMMENTS CONTROL ENDS******************************************/
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Control Home Page</a></li>
</ul>
<h2 style="color: #0000cc;">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
</h2>


<!----------------------------------*****************************************************SLIDER CONTROL STARTS******************************************---------------------------------->
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Slider Controller</h2>
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
                            
                            <td class="center"><img src="../php_upload/slider/<?php echo $data['slider_image'];?>" height="100" width="80"></td>
                            <td class="center"><?php echo strip_tags( $data['slider_text'] );?></td>

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
                                    <a class="btn btn-danger" href="?status=unpublished&slider_id=<?php echo $data['slider_id'] ?>" title="make active"><!--you can make notice active here-->
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>

    <?php } else { ?>
                                    <a class="btn btn-success" href="?status=published&slider_id=<?php echo $data['slider_id'] ?>" title="make inactive"><!--you can make notice inactive here-->
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
<!----------------------------------*****************************************************SLIDER CONTROL ENDS******************************************---------------------------------->



<!----------------------------------*****************************************************CLUB CONTROL STARTS******************************************---------------------------------->
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Club Controller</h2>
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
                        <th>Club Name</th>
                        <th>Photo</th>
                        
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php $i = 1;
                    while ($data = mysql_fetch_assoc($resource)) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            
                            <td class="center"><?php echo strip_tags( $data['club_name'] );?></td>
                            <td class="center"><img src="../php_upload/club/<?php echo $data['club_image'];?>" height="100" width="80"></td>
                            

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
                                
                                
<!--**********Indicating published and unpublished club with green sign and red sign and sending their id in GET method to change their status*******-->                        
    <?php if ($data['publication_status'] == 0) { ?>
                                    <a class="btn btn-danger" href="?condition=unpublished&club_id=<?php echo $data['club_id'] ?>" title="make active"><!--you can make notice active here-->
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>

    <?php } else { ?>
                                    <a class="btn btn-success" href="?condition=published&club_id=<?php echo $data['club_id'] ?>" title="make inactive"><!--you can make notice inactive here-->
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
<!----------------------------------*****************************************************CLUB CONTROL ENDS******************************************---------------------------------->


<!----------------------------------*****************************************************Parents Comments Control STARTS******************************************---------------------------------->


<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Parents Comments Controller</h2>
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
                        <th>Comments Poster</th>
                        <th>Comments</th>
                        
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
                            
                            <td class="center"><?php echo strip_tags( $data['comment_poster'] );?></td>
                            <td class="center"><?php echo strip_tags( $data['comments'] );?></td>
                            
                            

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
                                
                                
<!--**********Indicating published and unpublished comments with green sign and red sign and sending their id in GET method to change their status*******-->                        
    <?php if ($data['publication_status'] == 0) { ?>
                                    <a class="btn btn-danger" href="?state=unpublished&comments_id=<?php echo $data['comments_id'] ?>" title="make active"><!--you can make notice active here-->
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>

    <?php } else { ?>
                                    <a class="btn btn-success" href="?state=published&comments_id=<?php echo $data['comments_id'] ?>" title="make inactive"><!--you can make notice inactive here-->
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


<!----------------------------------*****************************************************Parents Comments Control ENDS******************************************---------------------------------->