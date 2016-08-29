<?php
//browser back button press control
if($_SESSION['teacher_id'] == NULL){
    header('Location: login.php');
}

//if teacher click on logout url
if (@$_GET['logout'] == 'true') {
    $app_obj->logout();
}

//show only those students to a logged in teacher who have taken course of that teacher
$resource = $app_obj->show_student_list_to_teacher($_SESSION['teacher_id']);

//this will update student result
if(isset($_POST['btn'])){
    $message=$app_obj->save_student_result($_POST);
}
?>

<h1 align="middle">Submit Student result</h1><hr/>
<h2 class="text-success" align="middle">
<?php 
if(isset($message)){
    echo $message;
    unset($message);
}
?>
</h2>
<form action="" method="post">

<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <?php if(gettype($resource) !== "NULL" ){?><!--Show row heading only when there are some students under this teacher-->
                    <tr>
                        <th>Stunden Name</th>
                        <th>Student ID</th>

                        <th>Obtained Mark</th>
                        
                    </tr>
                    <?php } ?>
                </thead>   
                <tbody>
                  <?php 
                  if(gettype($resource)=== "NULL" ){
                      echo '<h3 align="middle">No Student Is Waiting For Result</h3>';
                  }else{
                  while($data = mysql_fetch_assoc($resource)) {?>
                        <tr>
                            <td><?php echo $data['student_name']?></td>
                            <td class="center"><?php echo $data['student_id']?></td>

                            <td class="center">
                                
                                <input type="text" name="obtained_mark[]" value="<?php /*@ToDo show inputted value here */?>">
                                <input type="hidden" name="result_id[]" value="<?php echo $data['result_id'];?>" >
                            </td>
                            
                        </tr>
                  <?php } }?>
                        
                </tbody>
                
            </table>
    
<?php if(gettype($resource) !== "NULL" ){ ?><!--Show this button only when there are some students under this teacher-->
<button type="submit" name="btn" class="btn btn-primary ">Publish result</button>
<?php } ?>

</form>