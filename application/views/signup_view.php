<div id="regHeader"><br/><br/><br/>
    <div id="regBody"><br/>
        <h1>Create Your Account</h1>
        <span class="errorValidation"><?php echo validation_errors(); ?></span>
        
        <?php echo form_open('signup/validate'); ?>
        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" value="<?php echo set_value('email'); ?>"/>
            <br/>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>"/>
            <br/>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
            <br/>
        <input type="password" class="form-control" id="passwordconf" name="passwordconf" placeholder="Confirm Password"/>
            <br/>  
        <input name="submit" type="submit" class="alignSignUpButton" value="Sign Up"/>
        <?php echo form_close('<br>'); ?>
    </div>
    <p><a href="/login">Already have an account? Click here to login instead!</a></p>
</div>