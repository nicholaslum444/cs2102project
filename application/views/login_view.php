<div class="content">
<center><h1>Login to NUSMaids</h1></center>
        <hr>
        <span class="errorValidation"><?php echo validation_errors(); ?></span>
        
        <div class="alignForm">
        <?php echo form_open('login/validate'); ?>
            <input type="text" class="form_control" id="username" name="username" placeholder="Username"/>
            <input type="password" class="form_control" id="password" name="password" placeholder="Password"/>
            <input type="submit" class="loginBtn btn-lg btn-primary" value="Login"/>
        <?php echo form_close('<br>'); ?></div>
    <p><a href="/signup"><center>No account? Click here to signup instead!</center></a></p>
</div>