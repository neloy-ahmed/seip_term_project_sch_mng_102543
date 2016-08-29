<?php
require 'db_connect.php';

/**
 * This class will controle all admin panel functionality
 *
 * @author Neloy
 */
class Super_Admin {
    public function __construct() {
        $db_obj = new Db_Connect();
    }
    
/*>>>>>>>>>>>>>>>Insert Notice information into Database<<<<<<<<<<<<<<<<<<<*/    
    public function save_notice($data){
 //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//
        $notice_title = addslashes($data['notice_title']);// without this function db is not taking --O'rielly-- type of string
        $notice_short_description = addslashes($data['notice_short_description']);
        $notice_long_description = addslashes($data['notice_long_description']);
 //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        $sql = "INSERT INTO tbl_notice (notice_priority, notice_title, notice_publication_time, notice_short_description, notice_long_description, publication_status) VALUES('$data[notice_priority]', '$notice_title', NOW(), '$notice_short_description', '$notice_long_description', '$data[publication_status]')";
        
        if(mysql_query($sql)){
            $message = 'Notice Saved Successfully';
            return $message;
        }else{
            die('sql error'.mysql_error() );
        }
    }
    
    
/*>>>>>>>>>>>>>>>SELECT ALL NOTICE FROM DATABASE<<<<<<<<<<<<<<<<<<<*/
    public function select_all_notice(){
        $sql = "SELECT * FROM tbl_notice WHERE deletion_status=0";
        $result = mysql_query($sql);
        return $result;
    }
    
/*>>>>>>>>>>>>>>>SELECT A SINGLE NOTICE ROW FROM DATABASE<<<<<<<<<<<<<<<<<<<*/    
    public function select_notice_by_id($notice_id){
        $sql = "SELECT * FROM tbl_notice WHERE notice_id= '$notice_id' ";
        $result = mysql_query($sql);
        return $result;
    }
    
    /*>>>>>>>>>>>>>>>EDIT NOTICE OR UPDATE NOTICE INFORMATIONS<<<<<<<<<<<<<<<<<<<*/
    public function update_notice_info($data){
        //-------------------------- Giving user the choice to change database notice entry time that were set when first time saving the notice --------------start------------//
        if($data['update_time']==0){
        $select_notice_by_id = $this->select_notice_by_id($data['notice_id']);
        $notice_info = mysql_fetch_assoc($select_notice_by_id);
        $notice_publication_time = $notice_info['notice_publication_time'];
           /* echo '<pre>';
            print_r($notice_info);
            exit();*/     
        }
        elseif($data['update_time']==1){
            $sql = "UPDATE tbl_notice SET notice_publication_time=NOW() WHERE notice_id='$data[notice_id]' ";
            mysql_query($sql);
            $updated_time = "SELECT * FROM tbl_notice WHERE notice_id='$data[notice_id]' ";
            $query_resource_location = mysql_query($updated_time);
            $notice_info = mysql_fetch_assoc($query_resource_location);
           
            $notice_publication_time = $notice_info['notice_publication_time'];
        }
        //-------------------------- Giving user the choice to change database notice entry time that were set when first time saving the notice--------------end------------//
        
        
         //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        $notice_title = addslashes($data['notice_title']);// without this function db is not taking --O'rielly-- type of string
        $notice_short_description = addslashes($data['notice_short_description']);
        $notice_long_description = addslashes($data['notice_long_description']);
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        
        $sql = "UPDATE tbl_notice SET notice_priority='$data[notice_priority]', notice_title='$notice_title', notice_publication_time='$notice_publication_time', notice_short_description='$notice_short_description', notice_long_description='$notice_long_description', publication_status='$data[publication_status]' WHERE notice_id='$data[notice_id]' ";
        $query_result = mysql_query($sql);
        
        if($query_result){
            $_SESSION['message'] = 'Notice Updated Successfully';;
            header('Location: manage_notice.php');
        }else{
            die('sql error --> '. mysql_error());
        }
    }
    
/*>>>>>>>>>>>>>>>UPDATE AN UNPUBLISHED NOTICE TO PUBLISHED<<<<<<<<<<<<<<<<<<<*/    
    public function make_notice_published($notice_id){
        $sql = "UPDATE tbl_notice SET publication_status= 1 WHERE notice_id='$notice_id' ";
        $result = mysql_query($sql);
        $_SESSION['message'] = 'Notice Published Successfully.';
    }

    
/*>>>>>>>>>>>>>>>UPDATE AN PUBLISHED NOTICE TO UNPUBLISHED<<<<<<<<<<<<<<<<<<<*/ 
    public function make_notice_unpublished($notice_id){
        $sql = "UPDATE tbl_notice SET publication_status= 0 WHERE notice_id='$notice_id' ";
        $result = mysql_query($sql);
        $_SESSION['message'] = 'Notice inactivated !!! ';
    }
    
    
/*>>>>>>>>>>>>>>>SEND NOTICE INTO RECYCLE BIN<<<<<<<<<<<<<<<<<<<*/ 
    
    public function archive_notice($notice_id){
        $sql = "UPDATE tbl_notice SET deletion_status=1 WHERE notice_id='$notice_id' ";
        mysql_query($sql);
        $_SESSION['message'] = 'Notice archived successfully';
        
        //header('Location:manage_category.php');
        
    }
    
/********************************@@@@@@@->  Notice End  <-@@@@@@@@*******************************************/
    
    
/********************************@@@@@@@->  Teacher Start  <-@@@@@@@@*******************************************/

/*>>>>>>>>>>>>>>>INSERT TEACHER INFORMATION INTO DATABASE<<<<<<<<<<<<<<<<<<<*/      
    public function save_teacher($data, $file){
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        $full_name = addslashes($data['full_name']);
        $grid_summary = addslashes($data['grid_summary']);
        $teacher_profile = addslashes($data['teacher_profile']);
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        $image_name = $file['grid_image']['name'];
        
        $source = $file['grid_image']['tmp_name'];
        $destination = "../php_upload/teacher/" . $image_name;
        $sql = "INSERT INTO tbl_teacher (grid_image, full_name, grid_summary, teacher_profile, publication_status) VALUES('$image_name', '$full_name', '$grid_summary', '$teacher_profile', '$data[publication_status]')";
        
        if(mysql_query($sql)){
            move_uploaded_file($source, $destination);
            $message = 'Teacher Saved Successfully';
            return $message;
        }else{
            echo 'sql error ----> '.mysql_error();
        }
    }
    
/*>>>>>>>>>>>>>>>SELECT ALL TEACHER FROM DATABASE<<<<<<<<<<<<<<<<<<<*/
    public function select_all_teacher(){
        $sql = "SELECT * FROM tbl_teacher WHERE deletion_status=0";
        $result = mysql_query($sql);
        return $result;
    }
    
    
/*>>>>>>>>>>>>>>>SELECT A SINGLE TEACHER ROW FROM DATABASE<<<<<<<<<<<<<<<<<<<*/    
    public function select_teacher_by_id($teacher_id){
        $sql = "SELECT * FROM tbl_teacher WHERE teacher_id= '$teacher_id' ";
        $result = mysql_query($sql);
        return $result;
    }
    
    /*>>>>>>>>>>>>>>>UPDATE AN UNPUBLISHED TEACHER TO PUBLISHED<<<<<<<<<<<<<<<<<<<*/    
    public function make_teacher_published($teacher_id){
        $sql = "UPDATE tbl_teacher SET publication_status= 1 WHERE teacher_id='$teacher_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        $_SESSION['message'] = 'Teacher Profile Published Successfully.';
        
    }

    
/*>>>>>>>>>>>>>>>UPDATE AN PUBLISHED TEACHER TO UNPUBLISHED<<<<<<<<<<<<<<<<<<<*/ 
    public function make_teacher_unpublished($teacher_id){
        $sql = "UPDATE tbl_teacher SET publication_status= 0 WHERE teacher_id='$teacher_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        $_SESSION['message'] = 'Teacher Profile inactivated !!! ';
        
    }
    
    /*>>>>>>>>>>>>>>>SEND NOTICE INTO RECYCLE BIN<<<<<<<<<<<<<<<<<<<*/ 
    
    public function archive_teacher($teacher_id){
        $sql = "UPDATE tbl_teacher SET deletion_status=1 WHERE teacher_id='$teacher_id' ";
        mysql_query($sql);
        $_SESSION['message'] = 'Teacher archived successfully';
        
        //header('Location:manage_category.php');
        
    }
    
    
    /*>>>>>>>>>>>>>>>EDIT TEACHER OR UPDATE TEACHER INFORMATIONS<<<<<<<<<<<<<<<<<<<*/
    public function update_teacher_info($data, $file){
       
        if( (!$file['grid_image']['name']=='' || !$file['grid_image']['size']==0 ) ){ //------Programm will only enter this block if user try to upload a new image file----------START-------
           
            $check_image = $this->check_image($file['grid_image']['type'], $file['grid_image']['size'], $file['grid_image']['error']); //Checking if user uploaded a valid image
           
           if($check_image == 1){  //uploading the new image if it is valid
               
               $image_name = $file['grid_image']['name'];
               $source = $file['grid_image']['tmp_name'];
               $destination = "../php_upload/teacher/" . $image_name;
               
               
               $img_sql = "UPDATE tbl_teacher SET grid_image='$image_name' WHERE teacher_id='$data[teacher_id]' "; //imgae update query
               mysql_query($img_sql);
               if(mysql_query($img_sql)){                //if image update query executed successfully move uploaded image to specific directory.
                   move_uploaded_file($source, $destination);  //placing newly uploaded image to ---php_upload/teacher -- directory
                   $unlink_location = '../php_upload/teacher/'.$data['previous_grid_image'];
                   unlink($unlink_location); //removing the previously stored image.
               }else{
                   echo 'sql error'.mysql_error();
                   exit();
               }
           }else if($check_image == 0){ // if image is not valid don't save anything in DB.
               echo 'Invalid Image !!! ';
               exit();
           }
        }//------------------------------------------------Programm will only enter this block if user try to upload a new image file----------END-------
        
        //---------------After uploading image successfully now proceed to update other informations----------------------------
        
         //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        $full_name = addslashes($data['full_name']);// without this function db is not taking --O'rielly-- type of string
        $grid_summary = addslashes($data['grid_summary']);
        $teacher_profile = addslashes($data['teacher_profile']);
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        
        $sql = "UPDATE tbl_teacher SET full_name='$full_name', grid_summary='$grid_summary', teacher_profile='$teacher_profile', publication_status='$data[publication_status]' WHERE teacher_id='$data[teacher_id]' ";
        $query_result = mysql_query($sql);
        
        if($query_result ){ //if image update and other information update is successful then stor a sccess message in session  and change the header location.
            $_SESSION['message'] = 'Teacher Information Updated Successfully';;
            header('Location: manage_teacher.php');
        }else{
            die('sql error --> '. mysql_error());
        }
    }
    
    
    /********************************@@@@@@@->  Teacher End  <-@@@@@@@@*******************************************/
    
    
    /********************************@@@@@@@->  Gallery Start  <-@@@@@@@@*******************************************/
    
    
    /*>>>>>>>>>>>SAVING GALLERY ALBUM NAME<<<<<<<<<<*/
    public function save_gallery_album($data){
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        $album_title = addslashes(strtoupper($data['album_title']));// without this function db is not taking --O'rielly-- type of string
        
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        
        $sql = "INSERT INTO tbl_gallery_album (album_title, publication_status)VALUES('$album_title', '$data[publication_status]')";
        if(mysql_query($sql)){//-making the recently added album published and all other unpublished----
            
            $last_inseted_id = mysql_insert_id();
            
            $sql_publish = "UPDATE tbl_gallery_album SET publication_status = CASE "
                . "WHEN album_id ='$last_inseted_id' THEN 1 "
                . "ELSE 0 "
                . "END";
            if(mysql_query($sql_publish)){
            $message = 'Album Saved Successfully Now Go To --Add gallery Image-- To upload images to this Album  ';
            return $message;
            }else{
                die('sql_error').mysql_error();
            }
        }else{
            die('sql ErRor ------->').mysql_error();
        }
    }
    
    //This function is for showing dropdown album list when adding new images to gallery ---add_gallery.php---
    public function select_all_published_album(){
        //The following query will select all published album with descending order--- means last entry will be the first item in dropdown menu
        $sql = "SELECT * FROM tbl_gallery_album WHERE publication_status=1 AND deletion_status=0 ORDER BY album_id DESC";
        $result = mysql_query($sql);
        return $result;
    }
    
    
    public function save_gallery_image($data, $file){
        
        $image_name = $file['gallery_image']['name'];
        
        $source = $file['gallery_image']['tmp_name'];
        $destination = "../php_upload/gallery/" . $image_name;
        $sql = "INSERT INTO tbl_gallery (gallery_image, album_id,  publication_status) VALUES('$image_name', '$data[album_id]', '$data[publication_status]')";
        
        if(mysql_query($sql)){
            move_uploaded_file($source, $destination);
            $message = 'Gallery Image Saved Successfully';
            return $message;
        }else{
            echo 'sql error ----> '.mysql_error();
        }
    }
    
    
    /*>>>>>>>>>>>Select An Album From DB<<<<<<<<<<*/ 
    public function select_album_by_id($album_id){
        $sql = "SELECT tbl_gallery . * ,"
                . "tbl_gallery_album . * "
                . "FROM tbl_gallery  LEFT JOIN  tbl_gallery_album ON tbl_gallery. album_id = tbl_gallery_album.album_id "
                . "WHERE tbl_gallery_album.album_id= '$album_id' ";   
        
        if(mysql_query($sql)){
            $resource = mysql_query($sql);
            return $resource;
        }else{
            die('sql error ---------->').mysql_error();
        }
        
    }
    
    /*>>>>>>>>>>>Make a single ablum published and all other unpublished<<<<<<<<<<*/ 
    public function make_a_single_album_published($album_id){
        $sql = "UPDATE tbl_gallery_album SET publication_status = CASE "
                . "WHEN album_id ='$album_id' THEN 1 "
                . "ELSE 0 "
                . "END";
        
        if(mysql_query($sql)){
            $_SESSION['message'] =  ' Album Published Successfully  ';
        }
        else{
            die('sql ErRor ------->').mysql_error(); 
        }
    }
    
    /*>>>>>>>>>>>Delete a single image from gallery<<<<<<<<<<*/
    public function delete_image_by_id($img_id, $file_name){
        //this querey is to remain on the same url when i am deleting an image and passing info with url.
        $album_info_sql = "SELECT album_id FROM tbl_gallery WHERE image_id='$img_id'";
        $album_resource = mysql_query($album_info_sql);
        $album_info= mysql_fetch_assoc($album_resource);
        
        $sql = "DELETE FROM tbl_gallery WHERE image_id='$img_id' ";
        if(mysql_query($sql)){
            $unlink_location = '../php_upload/gallery/'.$file_name;
            unlink($unlink_location);
            
            
            //this header is to remain on the same url when i am deleting an image and passing info with url.
            header('Location: http://localhost/seip_term_project_sch_mng_102543/Neloy/edit_album.php?album_id='.$album_info['album_id']);
            
        }else{
            die('Sql Error--------->').mysql_error();
        }
    }
    
    /*>>>>>>>>>>>>>>>EDIT ALBUM OR UPDATE ALBUM INFORMATIONS<<<<<<<<<<<<<<<<<<<*/
    public function update_album_info($data, $file){
       
        if( (!$file['gallery_image']['name']=='' || !$file['gallery_image']['size']==0 ) ){ //------Programm will only enter this block if user try to upload a new image file----------START-------
           
            $check_image = $this->check_image($file['gallery_image']['type'], $file['gallery_image']['size'], $file['gallery_image']['error']); //Checking if user uploaded a valid image
           
           if($check_image == 1){  //uploading the new image if it is valid
               
               $image_name = $file['gallery_image']['name'];
               $source = $file['gallery_image']['tmp_name'];
               $destination = "../php_upload/gallery/" . $image_name;
               
               
               $img_sql = "INSERT INTO tbl_gallery (gallery_image, album_id,  publication_status) VALUES('$image_name', '$data[album_id]', '1')";
               
               if(mysql_query($img_sql)){                //if image update query executed successfully move uploaded image to specific directory.
                   move_uploaded_file($source, $destination);  //placing newly uploaded image to ---php_upload/gallery -- directory
                   
               }else{
                   echo 'sql error'.mysql_error();
                   exit();
               }
           }else if($check_image == 0){ // if image is not valid don't save anything in DB.
               echo 'Invalid Image !!! ';
               exit();
           }
        }//------------------------------------------------Programm will only enter this block if user try to upload a new image file----------END-------
        
        //---------------After uploading image successfully now proceed to update other informations----------------------------
        
         //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        $album_title = addslashes($data['album_title']);// without this function db is not taking --O'rielly-- type of string
        
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        
        $sql = "UPDATE tbl_gallery_album SET album_title='$album_title' WHERE album_id='$data[album_id]' ";
        
        
        if(mysql_query($sql) ){ //if image update and other information update is successful then store a sccess message in session  and __let's see to -->change the header location.
            $_SESSION['message'] = 'Album Information Updated Successfully';
            header('Location: manage_gallery_album.php');
            
        }else{
            die('sql error --> '. mysql_error());
        }
    }
    
    public function select_all_album(){
        
        $sql = "SELECT * FROM tbl_gallery_album WHERE deletion_status=0 ";
        $resource = mysql_query($sql);
        return $resource;
    }
    
    
 /********************************@@@@@@@->  Home Page Maker Start  <-@@@@@@@@*******************************************/
    /*>>>>>>>>>>>>>>>SAVE HOME PAGE SLIDER INFO INTO DB<<<<<<<<<<<<<<<<<<<*/
    public function save_slider($data, $file ){
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        
        $slider_text = addslashes($data['slider_text']);
        
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        $image_name = $file['slider_image']['name'];
        
        $source = $file['slider_image']['tmp_name'];
        $destination = "../php_upload/slider/" . $image_name;
        $sql = "INSERT INTO tbl_slider (slider_image, slider_text, publication_status) VALUES('$image_name', '$slider_text', '$data[publication_status]')";
        
        if(mysql_query($sql)){
            move_uploaded_file($source, $destination);
            $message = 'Slider Image Saved Successfully';
            return $message;
        }else{
            echo 'sql error ----> '.mysql_error();
        }
    }
    
    
    
    

    /*>>>>>>>>>>>>>>>SAVE HOME PAGE CLUB INFO INTO DB<<<<<<<<<<<<<<<<<<<*/
    //@ToDo This ---save_club()--- is almost mirror image of ---save_slider()--- function i need to do some code reuse here
    public function save_club($data, $file ){
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        $club_name = addslashes($data['club_name']);
        $club_short_description = addslashes($data['club_short_description']);
        
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        $image_name = $file['club_image']['name'];
        
        $source = $file['club_image']['tmp_name'];
        $destination = "../php_upload/club/" . $image_name;
        $sql = "INSERT INTO tbl_club (club_name, club_image, club_short_description, publication_status) VALUES('$club_name', '$image_name', '$club_short_description', '$data[publication_status]')";
        
        if(mysql_query($sql)){
            move_uploaded_file($source, $destination);
            $msg = 'Club Informatin Updated Successfully';
            return $msg;
        }else{
            echo 'sql error ----> '.mysql_error();
        }
    }
    
    /*>>>>>>>>>>>>>>>SAVE PARENT'S COMENTS INTO DB<<<<<<<<<<<<<<<<<<<*/
    public function save_comment($data ){
        
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        $comments = addslashes($data['comments']);
        $comment_poster = addslashes($data['comment_poster']);
                
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        
        $sql = "INSERT INTO tbl_parents_comments (comments, comment_poster, publication_status) VALUES ('$comments', '$comment_poster', '$data[publication_status]')";
        if(mysql_query($sql)){
            $mssg = 'Comments Uploaded Successfully';
            return $mssg;
        }else{
            die(mysql_error());
        }
    }
    
/********************************@@@@@@@->  Home Page Controller Start  <-@@@@@@@@*******************************************/
    /*>>>>>>>>>>>>>>>SHOW HOME PAGE SLIDER INFO TO ADMIN<<<<<<<<<<<<<<<<<<<*/
    public function select_all_slider(){
        $sql = "SELECT * FROM tbl_slider WHERE deletion_status=0";
        $result = mysql_query($sql);
        return $result;
        
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN UNPUBLISHED SLIDER TO PUBLISHED<<<<<<<<<<<<<<<<<<<*/    
    //@ToDo This function is exactly mirror image of --make_teacher_published()-- need to code reuse
    public function make_slider_published($slider_id){
        $sql = "UPDATE tbl_slider SET publication_status= 1 WHERE slider_id='$slider_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Slider Image Activated Successfully.';
        }
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN PUBLISHED SLIDER TO UNPUBLISHED<<<<<<<<<<<<<<<<<<<*/
    //@ToDo This function is exactly mirror image of --make_teacher_unpublished()-- need to code reuse
    public function make_slider_unpublished($slider_id){
        $sql = "UPDATE tbl_slider SET publication_status= 0 WHERE slider_id='$slider_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Slider Image inactivated !!! ';
        }
    }
    
    
    /*>>>>>>>>>>>>>>>SHOW HOME PAGE CLUB INFO TO ADMIN<<<<<<<<<<<<<<<<<<<*/
    public function select_all_club(){
        $sql = "SELECT * FROM tbl_club WHERE deletion_status=0";
        $result = mysql_query($sql);
        return $result;
        
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN UNPUBLISHED CLUB TO PUBLISHED<<<<<<<<<<<<<<<<<<<*/    
    //@ToDo This function is exactly mirror image of --make_teacher_published()-- need to code reuse
    public function make_club_published($club_id){
        $sql = "UPDATE tbl_club SET publication_status= 1 WHERE club_id='$club_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Club Published Successfully.';
        }
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN PUBLISHED CLUB TO UNPUBLISHED<<<<<<<<<<<<<<<<<<<*/
    //@ToDo This function is exactly mirror image of --make_teacher_unpublished()-- need to code reuse
    public function make_club_unpublished($club_id){
        $sql = "UPDATE tbl_club SET publication_status= 0 WHERE club_id='$club_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Club inactivated !!! ';
        }
        
    }
    
    
    /*>>>>>>>>>>>>>>>SHOW PARENTS COMMENTS TO ADMIN<<<<<<<<<<<<<<<<<<<*/
    public function select_all_comments(){
        $sql = "SELECT * FROM tbl_parents_comments WHERE deletion_status=0";
        $result = mysql_query($sql);
        return $result;
        
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN UNPUBLISHED PARENTS COMMENTS TO PUBLISHED<<<<<<<<<<<<<<<<<<<*/    
    //@ToDo This function is exactly mirror image of --make_teacher_published()-- need to code reuse
    public function make_comments_published($comments_id){
        $sql = "UPDATE tbl_parents_comments SET publication_status= 1 WHERE comments_id='$comments_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Comments Published Successfully.';
        }
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN PUBLISHED PARENTS COMMENTS TO UNPUBLISHED<<<<<<<<<<<<<<<<<<<*/
    //@ToDo This function is exactly mirror image of --make_teacher_unpublished()-- need to code reuse
    public function make_comments_unpublished($comments_id){
        $sql = "UPDATE tbl_parents_comments SET publication_status= 0 WHERE comments_id='$comments_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Comment get inactivated !!! ';
        }
        
    }
    
/********************************@@@@@@@->  Home Page Controller ENDS  <-@@@@@@@@*******************************************/


/********************************@@@@@@@->  Teachers Page Maker Start  <-@@@@@@@@*******************************************/    
    public function save_teachers_top($data, $file ){
        
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        
        $top_side_text = addslashes($data['top_side_text']);
        
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        $image_name = $file['top_side_image']['name'];
        
        $source = $file['top_side_image']['tmp_name'];
        $destination = "../php_upload/teacher/top_side/" . $image_name;
        
        $sql = "INSERT INTO tbl_teachers_top (top_side_image, top_side_text, publication_status) VALUES ('$image_name', '$top_side_text', '$data[publication_status]') ";
        if(mysql_query($sql)){
            move_uploaded_file($source, $destination);
            $message = "Teachers Page's Top Part Saved Successfully" ;
            return $message;
        }else{
            die(mysql_error());
        }
        
        
    }
    
    
/********************************@@@@@@@->  Teachers Page Controller Start  <-@@@@@@@@*******************************************/
    
    /*>>>>>>>>>>>>>>>SHOW Teachers Page Top TO ADMIN<<<<<<<<<<<<<<<<<<<*/
    public function select_teachers_top_part(){
        $sql = "SELECT * FROM tbl_teachers_top WHERE deletion_status=0";
        $result = mysql_query($sql);
        return $result;
        
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN UNPUBLISHED teachers_top_part TO PUBLISHED<<<<<<<<<<<<<<<<<<<*/    
    //@ToDo This function is exactly mirror image of --make_teacher_published()-- need to code reuse
    public function make_teachers_top_part_published($id){
        $sql = "UPDATE tbl_teachers_top SET publication_status= 1 WHERE id='$id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Teachers Page Top Part Activated Successfully.';
        }
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN PUBLISHED teachers_top_part TO UNPUBLISHED<<<<<<<<<<<<<<<<<<<*/
    //@ToDo This function is exactly mirror image of --make_teacher_unpublished()-- need to code reuse
    public function make_teachers_top_part_unpublished($id){
        $sql = "UPDATE tbl_teachers_top SET publication_status= 0 WHERE id='$id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Teachers Page Top Part inactivated !!! ';
        }
    }
    
    
    
    
/********************************@@@@@@@->  About Page Maker Start  <-@@@@@@@@*******************************************/

    /*>>>>>>>>>>>>>>>>>>>>SAVE WELCOME (about page top) INTO DB<<<<<<<<<<<<<<<<<<<<<*/
    public function save_welcome($data, $file ){
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        
        $welcome_text = addslashes($data['welcome_text']);
        
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        $image_name = $file['top_side_image']['name'];
        
        $source = $file['top_side_image']['tmp_name'];
        $destination = "../php_upload/about/" . $image_name;
        
        $sql = "INSERT INTO tbl_welcome (top_side_image, welcome_text, publication_status) VALUES ('$image_name', '$welcome_text', '$data[publication_status]') ";
        if(mysql_query($sql)){
            move_uploaded_file($source, $destination);
            $message = 'Welcome Part Saved Successfully' ;
            return $message;
        }else{
            die(mysql_error());
        }
        
    }
    
    
    /*>>>>>>>>>>>>>>>>>>>>SAVE FEATURED OFFER (about page 2nd top) INTO DB<<<<<<<<<<<<<<<<<<<<<*/
    public function save_featured_offer($data, $file){
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        
        $item_name = addslashes($data['item_name']);
        $item_short_description = addslashes($data['item_short_description']);
        
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        $image_name = $file['item_image']['name'];
        
        $source = $file['item_image']['tmp_name'];
        $destination = "../php_upload/featured_offer/" . $image_name;
        
        $sql = "INSERT INTO tbl_featured_offer (item_image, item_name, item_short_description, publication_status) VALUES ('$image_name', '$item_name', '$item_short_description', '$data[publication_status]' ) ";
        if(mysql_query($sql)){
            move_uploaded_file($source, $destination);
            $message = 'Featured Offer Saved Successfully' ;
            return $message;
        }else{
            die(mysql_error());
        }
        
    }
    
    
/********************************@@@@@@@->  About Page Controller Start  <-@@@@@@@@*******************************************/
    /*>>>>>>>>>>>>>>>SHOW WELCOME INFO TO ADMIN<<<<<<<<<<<<<<<<<<<*/
    public function select_all_welcome(){
        $sql = "SELECT * FROM tbl_welcome WHERE deletion_status=0";
        $result = mysql_query($sql);
        return $result;
        
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN UNPUBLISHED WELCOME TO PUBLISHED<<<<<<<<<<<<<<<<<<<*/    
    //@ToDo This function is exactly mirror image of --make_teacher_published()-- need to code reuse
    public function make_welcome_published($welcome_id){
        $sql = "UPDATE tbl_welcome SET publication_status= 1 WHERE welcome_id='$welcome_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Welcome Part Activated Successfully.';
        }
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN PUBLISHED WELCOME TO UNPUBLISHED<<<<<<<<<<<<<<<<<<<*/
    //@ToDo This function is exactly mirror image of --make_teacher_unpublished()-- need to code reuse
    public function make_welcome_unpublished($welcome_id){
        $sql = "UPDATE tbl_welcome SET publication_status= 0 WHERE welcome_id='$welcome_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'This Welcome get inactivated !!! ';
        }
    }
    
    
    
    /*>>>>>>>>>>>>>>>SHOW All FEATURED OFFER TO ADMIN<<<<<<<<<<<<<<<<<<<*/
    public function select_all_featured_offer(){
        $sql = "SELECT * FROM tbl_featured_offer WHERE deletion_status=0";
        $result = mysql_query($sql);
        return $result;
        
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN UNPUBLISHED OFFER TO PUBLISHED<<<<<<<<<<<<<<<<<<<*/    
    //@ToDo This function is exactly mirror image of --make_teacher_published()-- need to code reuse
    public function make_offer_published($offer_id){
        $sql = "UPDATE tbl_featured_offer SET publication_status= 1 WHERE offer_id='$offer_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Featured Offer Activated Successfully.';
        }
    }
    
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN PUBLISHED OFFER TO UNPUBLISHED<<<<<<<<<<<<<<<<<<<*/
    //@ToDo This function is exactly mirror image of --make_teacher_unpublished()-- need to code reuse
    public function make_offer_unpublished($offer_id){
        $sql = "UPDATE tbl_featured_offer SET publication_status= 0 WHERE offer_id='$offer_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Featured Offer get inactivated !!! ';
        }
    }

    
 /********************************@@@@@@@->  Contact Page Maker Start  <-@@@@@@@@*******************************************/
    /*>>>>>>>>>>>>>>>>>>>>SAVE CONTACT PAGE INTO DB<<<<<<<<<<<<<<<<<<<<<*/
    public function save_contact($data, $file ){
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------start------------//@ToDo@   addslashes will highly insecure my db
        
        $address = addslashes($data['address']);
        $phone_fax = addslashes($data['phone_fax']);
        $email = addslashes($data['email']);
        
        
        //-------------------------- without addslashes function db is not taking --O'rielly-- type of string--------------end------------//
        $image_name = $file['right_side_image']['name'];
        
        $source = $file['right_side_image']['tmp_name'];
        $destination = "../php_upload/contact/" . $image_name;
        
        $sql = "INSERT INTO tbl_contact (right_side_image, address, phone_fax, email, publication_status) VALUES ('$image_name', '$address', '$phone_fax', '$email', '$data[publication_status]') ";
        if(mysql_query($sql)){
            move_uploaded_file($source, $destination);
            $message = 'Contact Page Saved Successfully' ;
            return $message;
        }else{
            die(mysql_error());
        }
        
    }
    
/********************************@@@@@@@->  Contact Page Controller Start  <-@@@@@@@@*******************************************/    
    /*>>>>>>>>>>>>>>>SHOW Contact Page content TO ADMIN<<<<<<<<<<<<<<<<<<<*/
    public function select_contact_page(){
        $sql = "SELECT * FROM tbl_contact WHERE deletion_status=0";
        $result = mysql_query($sql);
        return $result;
        
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN UNPUBLISHED Contact Page content TO PUBLISHED<<<<<<<<<<<<<<<<<<<*/    
    //@ToDo This function is exactly mirror image of --make_teacher_published()-- need to code reuse
    public function make_contact_page_published($contact_id){
        $sql = "UPDATE tbl_contact SET publication_status= 1 WHERE contact_id='$contact_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'Contact Page Contents Activated Successfully.';
        }
    }
    
    
    /*>>>>>>>>>>>>>>>UPDATE AN PUBLISHED Contact Page content TO UNPUBLISHED<<<<<<<<<<<<<<<<<<<*/
    //@ToDo This function is exactly mirror image of --make_teacher_unpublished()-- need to code reuse
    public function make_contact_page_unpublished($contact_id){
        $sql = "UPDATE tbl_contact SET publication_status= 0 WHERE contact_id='$contact_id' ";
        $result = mysql_query($sql);
        //header('Location:manage_teacher.php');
        if($result){
        $_SESSION['message'] = 'These contents of contact page get inactivated !!! ';
        }
    }
    


    /*>>>>>>>>>>>>>>>>>>>>>>>>>Function To verify Image File<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/    
    public function check_image($file_type, $file_size, $file_error){
        //$allowed_exts = array("gif", "jpeg", "jpg", "png");
        // 5 MB = 5242880 Bytes // 100 MB = 104857600 Bytes //
        if((    ($file_type == "image/gif") || 
                ($file_type == "image/jpeg") || 
                ($file_type == "image/jpg") || 
                ($file_type == "image/pjpeg") ||
                ($file_type == "image/x-png") || 
                ($file_type == "image/png") )
           &&($file_size < 5242880)  // 5 MB = 5242880 Bytes
           &&($file_error <= 0))
            {
            return 1;
           }else{
               return 0;
           }
    }
    
/*>>>>>>>>>>>>>>>>>>>>>>>>>log out function<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
    public function logout(){
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);
        
        $_SESSION['message'] = 'You have successfully logged out';
        header('Location:index.php');
    }
}
