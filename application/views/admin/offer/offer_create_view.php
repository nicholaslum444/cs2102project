<div class="content">
	<h1><?php echo $header ?></h1>
	<hr>
	<div class="taskErrorValidation"><?php echo validation_errors(); ?></div>

	<?php echo form_open('admin/offer/validate'); ?>
	    <label for="text">Task</label>
	    <?php echo form_dropdown('task_id', $all_task_titles, 1, 'class="date_control"'); ?>
        <br>
		
        <label for="text">Offer Price</label>
		<?php echo form_input(['name'=>'price', 'value'=>'1.00', 'type'=>'number', 'step'=>'0.01', 'class'=>'date_control']); ?>
		<br>
		
		<label for="text">Offer Creator</label>
	    <?php echo form_dropdown('creator_id', $all_usernames, $user_id, 'class="date_control"'); ?>
		
	    <br/>
	    <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit" />
	<?php echo form_close(); ?>
</div>
