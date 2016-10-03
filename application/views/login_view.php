<div class="content">
<center><h1>Login to NUSMaids</h1></center>
        <hr>
        <span class="errorValidation"><?php echo validation_errors(); ?></span>
        
        <?php echo form_open('login/validate'); ?>
            <br/>
            <input type="text" class="form_control" id="username" name="username" placeholder="Username"/>
            <br/>
            <input type="password" class="form_control" id="password" name="password" placeholder="Password"/>
            <br/>
            <center><input type="submit" class="btn btn-lg btn-primary" value="Login"/></center>
        <?php echo form_close('<br>'); ?>
    <p><a href="/signup"><center>No account? Click here to signup instead!</center></a></p>
</div>