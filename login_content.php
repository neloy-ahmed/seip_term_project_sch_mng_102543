<?php
require_once './classes/app_authenticator.php';
$teacher_login_obj = new App_authenticator();


    if(isset($_POST['btn'])){
        $message = $app_obj->save_teacher_registration_info($_POST);
    }
    
    @$teacher_id= $_SESSION['teacher_id'];
    if($teacher_id != NULL){
        header('Location: teacher_landing.php');
    }
    
    if(isset($_POST['login'])){
        $message=$teacher_login_obj->check_teacher_login($_POST);
    }
?>


<!-- ========== CONTENT START ========== -->

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Log In</h1>
                <h1>
                <?php 
                //print message when someone is logged out successfully --You have successfully logged out--
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset ($_SESSION['message']);
                }
                
                //print message when someone given wrong username or password --Your User Name or Password is Invalid!--
                if(isset($message)){
                    echo $message;
                    unset($message);
                }
                ?>
                </h1>
                <h3>Already a Member? Log in here.</h3>
                <form role="form" name="login-form" id="login-form" action="" method="post">
                    
                    <div class="form-group" id="login-login-group">
                        <label for="login-input-login">Login</label>
                        <div class="input-group">
                            <input type="text" name="user_email" class="form-control" id="login-input-login" placeholder="Input your email">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group" id="login-password-group">
                        <label for="login-input-password">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="login-input-password" placeholder="&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;">
                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <!--<input type="checkbox"> Remember me  --><!--********************************@ToDo I MUST ADD THIS FUNCTIONALITY*******************************-->
                        </label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Log In</button>
                    <!--<a href="#" class="pull-right">Lost your password?</a>--><!--********************************@ToDo I MUST ADD THIS FUNCTIONALITY*******************************-->
                </form>
            </div>
            <div class="col-sm-6">
                <h1 class="text-success">
                    <?php
                    if(isset($message)){
                        echo $message;
                        unset($message);
                    }
                    ?>
                </h1>
                <h1>Register</h1>
                <h3>Do not have an account? Register here.</h3>
                <form role="form" name="register-form" id="register-form" action="" method="post">
                    
                    <div class="form-group" id="register-login-group">
                        <label for="register-input-login">Teacher Id</label>
                        <div class="input-group">
                            <input type="text" name="teacher_id" class="form-control" id="register-input-login" placeholder="If you don't have contac with admin">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="form-group" id="register-email-group">
                        <label for="register-input-email">Email</label>
                        <div class="input-group">
                            <input type="text" name="register_teacher_email" class="form-control" id="register-input-email" placeholder="Enter your email">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        </div>
                    </div>
                    
                    <div class="form-group" id="register-login-group">
                        <label for="register-input-login">Password</label>
                        <div class="input-group">
                            <input type="text" name="register_teacher_pw" class="form-control" id="register-input-login" placeholder="Give strong password">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        </div>
                    </div>
                    <button type="submit" name="btn" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ========== CONTENT END ========== -->