<div class="content">
        <h1>Create A New Account</h1>
        <hr>
        <span class="errorValidation"><?php echo validation_errors(); ?></span>
        
        <div class="alignForm">
        <?php echo form_open('signup/validate'); ?>
        <input type="email" class="form_control" id="email" name="email" placeholder="email@example.com" value="<?php echo set_value('email'); ?>"/>
        
        <input type="text" class="form_control" id="username" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>"/>
            
        <input type="password" class="form_control" id="password" name="password" placeholder="Password"/>
           
        <input type="password" class="form_control" id="passwordconf" name="passwordconf" placeholder="Confirm Password"/>
             
        <input name="submit" type="submit" class="loginBtn btn-lg btn-primary" value="Sign Up"/>
        <?php echo form_close('<br>'); ?></div>
    <p><center>Already have an account? Please click <a href="/login">here</a> to login instead.</center></p>
</div>