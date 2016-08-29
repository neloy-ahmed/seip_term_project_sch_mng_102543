
<?php

$result = $app_obj->select_notice_by_id($_GET['notice_id']);
$data = mysql_fetch_assoc($result);
?>

<table class="table table-bordered table-striped table-hover" style="width: 60%;" align='center' >
    
    <tr>
        <th>Notice Title</th>
        <td><?php echo $data['notice_title']; ?></td>
    </tr>
    <tr>
        <th>Publication Time</th>
        <td><?php echo $data['notice_publication_time']; ?></td>
    </tr>
    <tr>
        <th>Short Summary</th>
        <td><?php echo $data['notice_short_description']; ?></td>
    </tr>
    <tr>
        <th>Full Notice</th>
        <td><?php echo $data['notice_long_description']; ?></td>
    </tr>
    
</table>
