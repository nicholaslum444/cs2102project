<div class="content">
		<h1><?php echo $header ?></h1>
		<hr>
		<span class="errorValidation"><?php echo validation_errors(); ?></span>

		<?php echo form_open('admin/task/validate'); ?>
	    <input type="input" class="form_control" name="title" placeholder="Title of your task"/><br/>

	    <textarea type="input" class="textarea_control" name="description" placeholder="Description of your task"/></textarea><br/>

	    <center><label for="text">Enter your start date and time</label><br/></center>
	    <input type="date" class="form_control" name="start_date" ><br/>
	    <input type="time" class="form_control" name="start_time"><br/>

	    <center><label for="text" class="cen">Enter your end date and time</label></center>
	    <input type="date" class="form_control" name="end_date"><br/>
	    <input type="time" class="form_control" name="end_time"><br/>
        
        <center><label for="text" class="cen">Task Creator</label></center>
	    <?php echo form_dropdown('creator_id', $all_usernames, $user_id, 'class="form_control"'); ?>

	    <br/>
	    <center><input type="submit" class="btn btn-lg btn-primary" name="submit" value="Create Task" /></center>
	    <?php echo form_close('<br>'); ?>
</div>