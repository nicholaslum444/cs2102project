<div class="content">
	<h1><?php echo $header ?></h1>
	<hr>
	<div class="taskErrorValidation"><?php echo validation_errors(); ?></div>
	
	<?php echo form_open('admin/task/validate'); ?>
		<label for="text">Task Title</label>
		<input type="input" class="title_control" name="title" value="<?php echo set_value('title'); ?>"/><br/>
		
		<label for="text">Description</label>
		<textarea type="input" class="textarea_control" name="description"><?php echo set_value('description'); ?></textarea><br/>
		
		<label for="text">Start Date and Time</label><br/>
		<input type="date" class="date_control" name="start_date" value="<?php echo set_value('start_date');?>">
		<input type="time" class="time_control" name="start_time" value="<?php echo set_value('start_time');?>"><br/>
		
		<label for="text">End Date and Time</label>
		<input type="date" class="date_control" name="end_date" value="<?php echo set_value('end_date');?>">
		<input type="time" class="time_control" name="end_time" value="<?php echo set_value('end_time');?>"><br/>
		
		<label for="text">Task Creator</label>
		<?php echo form_dropdown('creator_id', $all_usernames, $user_id, 'class="date_control"'); ?><br/>
		
		<br/>
		<input type="submit" class="btn btn-lg btn-success" name="submit" value="Submit" />
		<input type="button" class="btn btn-lg btn-danger" onClick="clearForm(this.form);" value="Reset" />
	<?php echo form_close(); ?>
</div>