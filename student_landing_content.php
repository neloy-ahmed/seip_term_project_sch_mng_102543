<?php

//browser back button press control
if($_SESSION['student_id'] == NULL){
    header('Location: login_student.php');
}

//if teacher click on logout url
if (@$_GET['logout'] == 'true') {
    $app_obj->student_logout();
}

//show only those students to a logged in teacher who have taken course of that teacher
//$resource = $app_obj->show_student_list_to_teacher($_SESSION['teacher_id']);

//this will update student result
if(isset($_POST['btn'])){
    $resource = $app_obj->show_student_result($_SESSION['student_id']);
}
?>

<h1 align="middle">Hello <?php echo '<span class=btn-info>'. $_SESSION['student_name'].'</span>'?> How is your study going on</h1><hr/>
<div style="width: 60%;" align='center'>
<form action="" method="post">
<button type="submit" name="btn" class="btn btn-primary ">Check result</button>
<button type="submit" name="btn" class="btn btn-primary ">Check account</button>
</form>
</div>
    
    
    
    <?php if(isset($_POST['btn'])){ ?>
    
    
    <table class="table table-striped table-bordered bootstrap-datatable datatable" style="width: 60%;" align='center'>
                <thead>
                    
                    <tr>
                        <th>Subject </th>
                        <th>Obtained Mark</th>

                        
                        
                    </tr>
                    
                </thead>   
                <tbody>
                  <?php while($row = mysql_fetch_assoc($resource)) { ?>
                        <tr>
                            
                            <td class="center"><?php echo $row['subject_name'];?></td>

                            <td class="center"><?php 
                            if($row['obtained_mark'] == NULL){
                                echo 'Result is not published yet';
                            }else{
                            echo $row['obtained_mark']; }?></td>
                            
                        </tr>
                  <?php } ?>
                        
                </tbody>
                
            </table>
    
    
    
    
<?php  } ?>
<br/><br/>