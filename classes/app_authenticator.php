<?php

class App_authenticator {

    
/***********>>>>>>>>>>>>>>>Function to check TEACHER login<<<<<<<<<<<<<<<******************/
    public function check_teacher_login($data) {
        $password = md5($data['password']);
        //$sql = "SELECT * FROM tbl_admin WHERE admin_email_address='$data[admin_email_address]' AND admin_password='$password' ";
       $sql = "SELECT tbl_teacher. * , tbl_register_teacher. * 
                    FROM tbl_teacher
                    LEFT JOIN tbl_register_teacher ON tbl_teacher.teacher_id = tbl_register_teacher.teacher_id
                    WHERE tbl_register_teacher.register_teacher_email =  '$data[user_email]'
                    AND tbl_register_teacher.register_teacher_pw = '$password' ";
        
        /* $sql = "SELECT tbl_teacher. * ,"
                . " tbl_register_teacher. * "
                . " FROM tbl_teacher LEFT JOIN tbl_register_teacher ON tbl_teacher.teacher_id=tbl_register_teacher.teacher_id"
                . "WHERE tbl_register_teacher.register_teacher_email='$data[user_email]' AND tbl_register_teacher.register_teacher_pw='$password' ";*/
        $result = mysql_query($sql);

        if (mysql_query($sql)) {
            /*TEST CODE
                $admin_info = mysql_fetch_assoc($result);
                print_r($admin_info);
                exit(); TEST CODE END*/
           
            
            $admin_info = mysql_fetch_assoc($result);
            if ($admin_info) {
                //@ToDo i don't need --SELECT tbl_teacher. * , tbl_register_teacher. * --this query to select all just select only necessaray data.
                $_SESSION['teacher_name'] = $admin_info['full_name'];
                $_SESSION['teacher_photo'] = $admin_info['grid_image'];
                $_SESSION['teacher_profile'] = $admin_info['teacher_profile'];
                $_SESSION['teacher_email'] = $admin_info['register_teacher_email'];
                $_SESSION['teacher_id'] = $admin_info['teacher_id'];
                
                header('Location: teacher_landing.php');
         
            } else {
                //header('Location: index.php');
                $message = '<span class="text-danger">Your User Name or Password is Invalid!</span> ';
                mysql_error();
            }
            return $message;
        }
        
    }
    
    
/***********>>>>>>>>>>>>>>>Function to check STUDENT login<<<<<<<<<<<<<<<******************/
/*>>>>>>>>>>>>>>>@ToDo --check_teacher_login()-- and --check_student_login()-- are mirror image of each other i need reuse sigle function here<<<<<<<<<<<<<<<<<<< */
    public function check_student_login($data) {
        $password = md5($data['password']);
        //$sql = "SELECT * FROM tbl_admin WHERE admin_email_address='$data[admin_email_address]' AND admin_password='$password' ";
       $sql = "SELECT tbl_student. * , tbl_register_student. * 
                    FROM tbl_student
                    LEFT JOIN tbl_register_student ON tbl_student.student_id = tbl_register_student.student_id
                    WHERE tbl_register_student.register_student_email =  '$data[user_email]'
                    AND tbl_register_student.register_student_pw = '$password' ";
        
        /* $sql = "SELECT tbl_teacher. * ,"
                . " tbl_register_teacher. * "
                . " FROM tbl_teacher LEFT JOIN tbl_register_teacher ON tbl_teacher.teacher_id=tbl_register_teacher.teacher_id"
                . "WHERE tbl_register_teacher.register_teacher_email='$data[user_email]' AND tbl_register_teacher.register_teacher_pw='$password' ";*/
        $result = mysql_query($sql);

        if (mysql_query($sql)) {
            /*TEST CODE
                $admin_info = mysql_fetch_assoc($result);
                print_r($admin_info);
                exit(); TEST CODE END*/
           
            
            $student_info = mysql_fetch_assoc($result);
            if ($student_info) {
                //@ToDo i don't need --SELECT tbl_teacher. * , tbl_register_teacher. * --this query to select all just select only necessaray data.
                $_SESSION['student_name'] = $student_info['student_name'];
                
                $_SESSION['student_email'] = $student_info['register_student_email'];
                //i'm taking here primary key of tbl_student --i'm not sure but, it seems to me more secure--
                $_SESSION['student_id'] = $student_info['id'];
                
                header('Location: student_landing.php');
         
            } else {
                //header('Location: index.php');
                $message = '<span class="text-danger">Your User Name or Password is Invalid!</span> ';
                mysql_error();
            }
            return $message;
        }
        
    }
}

