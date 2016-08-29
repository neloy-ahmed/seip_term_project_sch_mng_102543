<div class="container">
    <ul class="pull-left">
        <li><a href="tel:1800123456"><i class="fa fa-phone"></i><span>1800-123-456</span></a></li>
        <li><a href="mailto:info@smartway.com"><i class="fa fa-envelope"></i><span>info@smartway.com</span></a></li>
    </ul>
    <nav class="pull-right">
        <ul>
            <li><a href="login.php"><i class="fa fa-user"></i><span>Register</span></a></li>
            <li><a href="login_redirector.php">
                        <?php 
                        if(@$_SESSION['student_id'] == NULL)
                        {echo 'Log in';?>
                        
                    
                    </a></li>
                    <?php }else{?>
             <li><a href="?logout=true">
                    <?php echo 'Log out';}?>
                        
                    
                    </a></li>
        </ul>
    </nav>
</div>