<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="popup" id="login">
    <div class="title">
        <?php echo translate('Login');?>

    </div>
    <div class="popup-content">
        <form action="logn.php" method="post">
            <input type="text" name="username" placeholder="<?php echo translate('Username');?>"/>
            <input type="password" name="password" placeholder="<?php echo translate('Password');?>"/><br/>
            <a href=""><?php echo translate('Forgot your password ?');?></a>
            <input type="submit" name="submit_login" class="login button" value="<?php echo translate('Login');?>"/>
            <span class="register"><?php echo translate("Don't have an account?");?><a href="registration.php"><?php echo translate('Register now!');?></a></span>
        </form>
    </div>
</div>
<div class="popup" id="feedback">
    <div class="title">
        <?php echo translate('Feedback');?>

    </div>
    <div class="popup-content">
        
    </div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>