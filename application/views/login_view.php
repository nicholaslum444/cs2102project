<div id="regHeader"><br/><br/><br/>
    <div id="regBody"><br/>
        <h1>Login to NUSMaids</h1>
        <span class="errorValidation"><?php echo validation_errors(); ?></span>
        
        <?php echo form_open('login/validate'); ?>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username"/>
            <br/>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
            <br/>
            <input type="submit" class="alignSignUpButton" value="Login"/>
        <?php echo form_close('<br>'); ?>
    </div>
    <p><a href="/signup">No account? Click here to signup instead!</a></p>
</div>