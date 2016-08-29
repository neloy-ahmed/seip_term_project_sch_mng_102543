<?php

require 'db_connect.php';   //as we'll need database connectin for front-end.

/**
 * I will controle my front-end here.
 *
 * @author Neloy
 */
class Application {
    
    //this will connect all the object of Application class with database.
    public function __construct() {
        $db_connect = new Db_Connect();
    }
    
    /*>>>>>>>>>>>>>>>SELECT All PUBLISHED AND NON ARCHIVED NOTICES FROM DB<<<<<<<<<<<<<<<<<<< */
    public function select_all_published_notice(){
        $sql = "SELECT * FROM tbl_notice WHERE publication_status=1 AND deletion_status=0";
        $resource = mysql_query($sql);
        return $resource;
    }
    
    
    /*>>>>>>>>>>>>>>>SELECT A SINGLE NOTICE ROW FROM DATABASE<<<<<<<<<<<<<<<<<<< @ToDo I have taken this function from super admin  direct copy paste which is not efficient so ..........*/
    public function select_notice_by_id($notice_id){
        $sql = "SELECT * FROM tbl_notice WHERE notice_id= '$notice_id' ";
        $resource = mysql_query($sql);
        return $resource;
    }
    
    /********************************@@@@@@@->  Teacher Start  <-@@@@@@@@*******************************************/
    
    /*>>>>>>>>>>>>>>>SELECT All PUBLISHED AND NON ARCHIVED TEACHER FROM DB<<<<<<<<<<<<<<<<<<<@ToDo try to make a single functin for --select_all_published_notice()-- and select_all_published_teacher()---   */
    public function select_all_published_teacher(){
        $sql = "SELECT * FROM tbl_teacher WHERE publication_status=1 AND deletion_status=0";
        $resource = mysql_query($sql);
        return $resource;
    }
    
    
    /*>>>>>>>>>>>>>>>SELECT A SINGLE TEACHER ROW FROM DATABASE<<<<<<<<<<<<<<<<<<< @ToDo try to make a single functin for --select_notice_by_id--  AND   select_teacher_by_id---   ..........*/
    public function select_teacher_by_id($teacher_id){
        $sql = "SELECT * FROM tbl_teacher WHERE teacher_id='$teacher_id' ";
        $resource = mysql_query($sql);
        return $resource;
    }
    
    /********************************@@@@@@@->  Gallery Start  <-@@@@@@@@*******************************************/
    
    /*>>>>>>>>>>>>>>>This function will show album name and images of that album<<<<<<<<<<<<<<<<<<< */
    public function show_gallery(){
        $sql = "SELECT tbl_gallery . * ,"
                . "tbl_gallery_album . album_title "
                . "FROM tbl_gallery  LEFT JOIN  tbl_gallery_album ON tbl_gallery. album_id = tbl_gallery_album.album_id "
                . "WHERE tbl_gallery_album.publication_status=1 AND tbl_gallery_album.deletion_status=0";   //As i have written my query this way so i'll need to make sure that only one album is active at any particular time
        if(mysql_query($sql)){
            $resource = mysql_query($sql);
            if(mysql_num_rows($resource)>0){
            return $resource;
            }/*elseif(mysql_num_rows($resource) == 0){
                return 'NO data found';
            }*/
        }else{
            echo 'SQL Error ---------> '.mysql_error();
        }
    }
    
    
/********************************@@@@@@@->  Page Maker Start  <-@@@@@@@@*******************************************/
/********************************@@@@@@@->  HomePage  <-@@@@@@@@*******************************************/
    
    /*>>>>>>>>>>>>>>>This function will show all published slider images and text<<<<<<<<<<<<<<<<<<< */
    public function select_all_published_slider(){
        $sql = "SELECT * FROM tbl_slider WHERE publication_status=1 AND deletion_status=0";
        if(mysql_query($sql)){
            $resource = mysql_query($sql);
            return $resource;
        }else{
            die(mysql_error());
        }
        
    }
    
    /*>>>>>>>>>>>>>>>This function will show all published club and short description<<<<<<<<<<<<<<<<<<< */
    //@ToDo This funciton is mirror image of --select_all_published_slider()--need to code reuse here
    public function select_all_published_club(){
        $sql = "SELECT * FROM tbl_club WHERE publication_status=1 AND deletion_status=0";
        if(mysql_query($sql)){
            $resource = mysql_query($sql);
            return $resource;
        }else{
            die(mysql_error());
        } 
    }
    
    
    /*>>>>>>>>>>>>>>>This function will show latest 4 Notice<<<<<<<<<<<<<<<<<<< */
    public function show_recent_notice(){
        $sql = "SELECT * 
                    FROM  `tbl_notice` 
                    ORDER BY notice_publication_time DESC 
                    LIMIT 4";
        
        if(mysql_query($sql)){
            $result = mysql_query($sql);
            return $result;
        }
    }
    
    
    /*>>>>>>>>>>>>>>>This function will show Parents Comments<<<<<<<<<<<<<<<<<<< */
    public function select_all_published_comments(){
        $sql = "SELECT * FROM tbl_parents_comments WHERE publication_status=1 AND deletion_status=0 ";
        if(mysql_query($sql)){
            $result = mysql_query($sql);
            return $result;
        }else{
            die(mysql_error());
        }
        
    }

    
/********************************@@@@@@@->  Teachers Page  <-@@@@@@@@*******************************************/
    /*>>>>>>>>>>>>>>>This function will show Teachers Page Top part<<<<<<<<<<<<<<<<<<< */
    public function show_teachers_top(){
        $sql = "SELECT * FROM tbl_teachers_top WHERE publication_status=1 AND deletion_status=0 LIMIT 1 ";
    if(mysql_query($sql)){
        $resource = mysql_query($sql) ;
        return $resource ;
    }else{
        die(mysql_error());
    }
    }
    


/********************************@@@@@@@->  About Page  <-@@@@@@@@*******************************************/

public function show_welcome(){
    
    $sql = "SELECT * FROM tbl_welcome WHERE publication_status=1 AND deletion_status=0 ";
    if(mysql_query($sql)){
        $resource = mysql_query($sql) ;
        return $resource ;
    }else{
        die(mysql_error());
    }
    
}



public function show_featured_offer(){
    $sql = "SELECT * FROM tbl_featured_offer WHERE publication_status=1 AND deletion_status=0 ";
    if(mysql_query($sql)){
        $resource = mysql_query($sql);
        return $resource;
    }else{
        die(mysql_error());
    }
    
}


/********************************@@@@@@@->  Contact Page  <-@@@@@@@@*******************************************/

/*>>>>>>>>>>>>>>>This function will show contact page<<<<<<<<<<<<<<<<<<< */
public function show_contact(){
    //although if there are more than one contact page active this query will show only one by --LIMIT 1--
    $sql = "SELECT * FROM tbl_contact WHERE publication_status=1 AND deletion_status=0 LIMIT 1 ";
    if(mysql_query($sql)){
        $resource = mysql_query($sql) ;
        return $resource ;
    }else{
        die(mysql_error());
    }
    
}


    /********************************@@@@@@@->  Login Registration Start  <-@@@@@@@@*******************************************/
    
    /*>>>>>>>>>>>>>>>This function will insert data into into --tbl_register_teacher-- for registration purpose<<<<<<<<<<<<<<<<<<< */

public function save_teacher_registration_info($data){
    //sql to get preloaded teacher_id FROM tbl_teacher
    $teacher_id_sql = "SELECT teacher_id FROM tbl_teacher WHERE publication_status=1 AND deletion_status=0";
    $teacher_id_resource = mysql_query($teacher_id_sql);
    
    while($row = mysql_fetch_assoc($teacher_id_resource)){//loop to go through all those preloaded `teacher_id`
            if($data['teacher_id'] === $row['teacher_id']){ //condition to check any match between user input `teacher_id` and preloaded `teacher_id`
                $sql = "INSERT INTO tbl_register_teacher (register_teacher_email, register_teacher_pw, teacher_id) VALUES('$data[register_teacher_email]', md5($data[register_teacher_pw]), '$data[teacher_id]')";
                if(mysql_query($sql)){
                    $message = 'Registration Successfully Completed';
                }else{
                    $message = '<span class=text-warning>'.'Your Email or Teacher id is already used!!!'.'</span>';
                    //die('sql error------>'.mysql_error());
                }
                break; //whenever program found the match between user input `teacher_id` and preloaded `teacher_id` it immediately get out from this while loop
            }
            else{//if there is not a single match between user input `teacher_id` and preloaded `teacher_id` then through this message
            $message = '<span class=text-danger>'.'This teacher id is not authorized please contac with admin!!!'.'</span>';
            }
        }
        
        return $message;
    }
    
    
    /*>>>>>>>>>>>>>>>This function will insert data into into --tbl_register_student-- for registration purpose<<<<<<<<<<<<<<<<<<< */
/*>>>>>>>>>>>>>>>@ToDo --save_student_registration_info()-- and --save_teacher_registration_info()-- are mirror image of each other i need reuse sigle function here<<<<<<<<<<<<<<<<<<< */

public function save_student_registration_info($data){
    //sql to get preloaded student_id FROM tbl_student
    $student_id_sql = "SELECT student_id FROM tbl_student WHERE publication_status=1 AND deletion_status=0";
    $student_id_resource = mysql_query($student_id_sql);
    
    while($row = mysql_fetch_assoc($student_id_resource)){//loop to go through all those preloaded `student_id`
            if($data['student_id'] === $row['student_id']){ //condition to check any match between user input `student_id` and preloaded `student_id`
                $sql = "INSERT INTO tbl_register_student (register_student_email, register_student_pw, student_id) VALUES('$data[register_student_email]', md5($data[register_student_pw]), '$data[student_id]')";
                if(mysql_query($sql)){
                    $msg = '<span class=text-success>Registration Successfully Completed</span>';
                }else{
                    $msg = '<span class=text-warning>'.'Your Email or Student id is already used!!!'.'</span>';
                    die('sql error------>'.mysql_error());
                }
                break; //whenever program found the match between user input `student_id` and preloaded `student_id` it immediately get out from this while loop
            }
            else{//if there is not a single match between user input `teacher_id` and preloaded `teacher_id` then through this message
            $msg = '<span class=text-danger>'.'This student id is not found into system please contac with admin!!!'.'</span>';
            }
        }
        
        return $msg;
    
}
    
    
/********************************@@@@@@@->  Result Processing Start  <-@@@@@@@@*******************************************/
    
    /*>>>>>>>>>>>>>>>This function will show all students to a teacher who have taken a specific subject that is taught by this teacher<<<<<<<<<<<<<<<<<<< */    
    
    public function show_student_list_to_teacher($teacher_id){
        //This function will get $teacher_id from a session varibale when teacher login.
        $subject_sql = "SELECT * FROM tbl_subject WHERE teacher_id='$teacher_id' ";
        $subject_resource = mysql_query($subject_sql);
        if($subject_resource){
        $subject_info = mysql_fetch_assoc($subject_resource);
        $sbject_id = $subject_info['subject_id'];
            if($sbject_id){
                $sql = "SELECT tbl_student . * , tbl_result . * 
                            FROM tbl_student
                            LEFT JOIN tbl_result ON tbl_result.student_unq_id = tbl_student.id
                            WHERE tbl_result.subject_id ='$sbject_id' ";
                $resource = mysql_query($sql);
                return $resource;
            }
        }else{
            die(mysql_error());
        }
    }
    
    
    /*>>>>>>>>>>>>>>>This function will store student result in DB<<<<<<<<<<<<<<<<<<< */    
    
    public function save_student_result($data){
        foreach( array_combine($data['result_id'], $data['obtained_mark']) as $key_result_id => $value_obtained_mark ){
            
        $sql = "UPDATE tbl_result SET obtained_mark='$value_obtained_mark' WHERE result_id='$key_result_id' ";
        
        mysql_query($sql);
            
        }
        if(mysql_query($sql)){
            $message = 'Student Result Upadated Successfully';
            return $message;
        }else{
            die(mysql_error());
        }
    }
    
    
    /*>>>>>>>>>>>>>>>This function will show individual student result to a logged in student<<<<<<<<<<<<<<<<<<< */
    public function show_student_result($student_id){
        $sql = "SELECT tbl_result . * , tbl_subject . * 
                    FROM tbl_result
                    LEFT JOIN tbl_subject ON tbl_result.subject_id = tbl_subject.subject_id
                    WHERE tbl_result.student_unq_id ='$student_id' ";
        $resource = mysql_query($sql);
        if($resource){
            return $resource;    
        }  else {
            die(mysql_error());
        }
        
    }




    /*>>>>>>>>>>>>>>>>>>>>>>>>>Teacher log out function<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
    public function logout(){
        unset($_SESSION['teacher_name']);
        unset($_SESSION['teacher_id']);
        unset($_SESSION['teacher_photo']);
        unset($_SESSION['teacher_profile']);
        unset($_SESSION['teacher_email']);
        
        $_SESSION['message'] = '<span class="text-success">You have successfully logged out</span>';
        header('Location:login.php');
    }
    
    /*>>>>>>>>>>>>>>>>>>>>>>>>>Student log out function<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
    public function student_logout(){
        unset($_SESSION['student_name']);
        unset($_SESSION['student_email']);
        unset($_SESSION['student_id']);
        
        
        $_SESSION['message'] = '<span class="text-success">You have successfully logged out</span>';
        header('Location:login_student.php');
    }
    
}//class ends here
/*"SELECT tbl_gallery . * ,"
                . "tbl_gallery_album . album_title "
                . "FROM tbl_gallery  LEFT JOIN  tbl_gallery_album ON tbl_gallery. album_id = tbl_gallery_album.album_id "
                . "WHERE tbl_gallery.publication_status=1 AND tbl_gallery.deletion_status=0";*/


