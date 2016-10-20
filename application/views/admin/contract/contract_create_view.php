<div class="content">
	<h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;<?php echo $header ?></h1>
	<hr>
	<div class="taskErrorValidation"><?php echo validation_errors(); ?></div>

	<?php echo form_open('admin/contract/validate'); ?>
	    <label for="text">Task</label>
	    <?php echo form_dropdown('task_id', $all_task_titles, 1, 'class="date_control"'); ?><br/>
		
		<label for="text">Corresponding Offer</label>
		<small>[offer id]: (offer creator, price) => (task creator, task)</small>
	    <?php echo form_dropdown('offer_id', $all_offers_options, 1, 'class="date_control"'); ?><br/>
		
		<label for="text">Completion Status</label>
	    <?php echo form_dropdown('completion_status', $completion_status, '', 'class="date_control"'); ?><br/>
		
	    <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit" />
	<?php echo form_close(); ?>
</div>
