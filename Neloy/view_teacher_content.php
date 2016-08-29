<?php

$result = $sup_obj->select_teacher_by_id($_GET['teacher_id']);
$data = mysql_fetch_assoc($result);
?>

<table class="table table-bordered table-striped table-hover" style="width: 60%;" align='center'>
    <tr>
        <th>Teacher Id</th>
        <td><?php echo $data['teacher_id']; ?></td>
    </tr>
    <tr>
        <th>Photo</th>
        <td><img src="../php_upload/teacher/<?php echo $data['grid_image']?>" height="200" width="150"></td>
    </tr>
    <tr>
        <th>Full Name</th>
        <td><?php echo $data['full_name']; ?></td>
    </tr>
    <tr>
        <th>Short summary</th>
        <td><?php echo $data['grid_summary']; ?></td>
    </tr>
    <tr>
        <th>Teacher Profile</th>
        <td><?php echo $data['teacher_profile']; ?></td>
    </tr>
    
    <tr>
        <th>Publication Status</th>
        <td><?php
            if ($data['publication_status'] == 1) {
                echo "Published";
            } else {
                echo "Unpublished";
            }
            ?>
        </td>
    </tr>
</table>