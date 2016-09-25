<div id="regHeader"><br/><br/><br/>
    <div id="regBody"><br/>
        <h1>Login to NUSMaids</h1>
        <span class="errorValidation"><?php echo validation_errors(); ?></span>
        <?php echo form_open('verifylogin'); ?>
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username"/>
            <br/>
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
            <br/>
            <input type="submit" class="alignSignInButton" value="Login"/>
        </form>
        <br/>
    </div>
</div>