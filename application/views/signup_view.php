<div class="content">
        <h1>Create A New Account</h1>
        <hr>
        <span class="errorValidation"><?php echo validation_errors(); ?></span>
        
        <?php echo form_open('signup/validate'); ?>
        <input type="email" class="form_control" id="email" name="email" placeholder="email@example.com" value="<?php echo set_value('email'); ?>"/>
            <br/>
        <input type="text" class="form_control" id="username" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>"/>
            <br/>
        <input type="password" class="form_control" id="password" name="password" placeholder="Password"/>
            <br/>
        <input type="password" class="form_control" id="passwordconf" name="passwordconf" placeholder="Confirm Password"/>
            <br/>  
        <center><input name="submit" type="submit" class="btn btn-lg btn-primary" value="Sign Up"/></center>
        <?php echo form_close('<br>'); ?>
    <p><center>Already have an account? Please click <a href="/login">here</a> to login instead.</center></p>
</div>