<div class="content">
	<h1><?php echo $header ?></h1>
	<hr>
	<div class="taskErrorValidation"><?php echo validation_errors(); ?></div>

	<?php echo form_open('admin/task/validate_update'); ?>
		<input type="hidden" name="id" value="<?php echo $tasks['id'] ?>">
		
	    <label for="text">Task Title</label>
	    <input type="input" class="title_control" name="title" value="<?php echo $tasks['title'] ?>" /><br/>
		
	    <label for="text">Task Description</label>
	    <textarea type="input" class="textarea_control" name="description"><?php echo $tasks['description'] ?></textarea><br/>
		
		<label for="text">Category</label>
		<?php echo form_dropdown('category', $all_categories, $tasks['category'], 'class="date_control"'); ?><br/>
		
		<label for="text">Price</label>
		<?php echo form_input(['name'=>'price', 'value'=>'1.00', 'type'=>'number', 'step'=>'0.01', 'class'=>'date_control']); ?><br/>
		
	    <label for="text">Start Date and Time</label><br/>
	    <input type="date" class="date_control" name="start_date" value="<?php echo $tasks['start_date'] ?>">
	    <input type="time" class="time_control" name="start_time" value="<?php echo $tasks['start_time'] ?>"><br/>
		
	    <label for="text">Enter your end date and time</label><br/>
	    <input type="date" class="date_control" name="end_date"  value="<?php echo $tasks['end_date'] ?>">
	    <input type="time" class="time_control" name="end_time" value="<?php echo $tasks['end_time'] ?>"><br/>
        
        <label for="text">Task Creator</label>
	    <?php echo form_dropdown('creator_id', $all_usernames, $tasks['creator_id'], 'class="date_control"'); ?>
		
	    <br/>
	    <input type="submit" class="btn btn-lg btn-success" name="submit" value="Submit" />
    <?php echo form_close('<br>'); ?>
</div>
