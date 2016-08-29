<div class="container">
    <ul class="pull-left">
        <li><a href="#"><i class="fa fa-calendar"></i><span><?php echo 'Today is :'.date("l");?></span></a></li>
        <li><a href="#"><span><?php echo date("Y-m-d")?></span></a></li>
    </ul>
    <nav class="pull-right">
        <ul>
            <li><a href="login.php"><i class="fa fa-user"></i><span>Register</span></a></li>
            <li><a href="login_redirector.php">
                        <?php 
                        if(@$_SESSION['teacher_id'] == NULL)
                        {echo 'Log in';?>
                        
                    
                    </a></li>
                    <?php }else{?>
             <li><a href="?logout=true">
                    <?php echo 'Log out';}?>
                        
                    
                    </a></li>
        </ul>
    </nav>
</div>