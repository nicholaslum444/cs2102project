<div class="content">
		<h1><?php echo $header ?></h1>
		<hr>
		<span class="errorValidation"><?php echo validation_errors(); ?></span>

		<?php echo form_open('task/validate'); ?>
	    <label for="text">Task Title</label>
	    <input type="input" class="title_control" name="title"><br/>

	    <label for="text">Task Description</label>
	    <textarea type="input" class="textarea_control" name="description"></textarea><br/>

	    <label for="text">Start Date and Time</label><br/>
	    <input type="date" class="date_control" name="start_date" >
	    <input type="time" class="time_control" name="start_time"><br/>

	    <label for="text">End Date and Time</label>
	    <input type="date" class="date_control" name="end_date">
	    <input type="time" class="time_control" name="end_time"><br/>

	    <br/>
	    <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit" />
	    <?php echo form_close('<br>'); ?>
</div>