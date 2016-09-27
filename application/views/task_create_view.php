<div id="regHeader"><br/><br/><br/>
    <div id="regBody"><br/>
		<h1><?php echo $header ?></h1>
		<span class="errorValidation"><?php echo validation_errors(); ?></span>

		<?php echo form_open('task/validate'); ?>
	    <input type="input" class="form-control" name="title" placeholder="Title of your task"/><br/>

	    <textarea type="input" class="textarea-control" name="description" placeholder="Description of your task"/></textarea><br/>

	    <label for="text">Enter your start date and time</label><br/>
	    <input type="date" class="form-control" name="start_date" ><br/>
	    <input type="time" class="form-control" name="start_time"><br/>

	    <label for="text">Enter your end date and time</label><br/>
	    <input type="date" class="form-control" name="end_date"><br/>
	    <input type="time" class="form-control" name="end_time"><br/>

	    <br/>
	    <input type="submit" class="alignSignUpButton" name="submit" value="Create Task" />
	    <?php echo form_close('<br>'); ?>
	</div>
</div>