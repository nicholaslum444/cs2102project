<div class="content">
	<h1><?php echo $header ?></h1>
	<hr>
	<div class="taskErrorValidation"><?php echo validation_errors(); ?></div>

	<?php echo form_open('admin/contract/validate_update'); ?>
		<?php echo form_hidden('contract_id', $contract['id']) ?>
		
	    <label for="text">Task</label>
	    <?php echo form_dropdown('task_id', $all_task_titles, $contract['task_id'], 'class="date_control"'); ?><br/>
		
		<label for="text">Corresponding Offer</label>
		<small>[offer id]: (offer creator, price) => (task creator, task)</small>
	    <?php echo form_dropdown('offer_id', $all_offers_options, $contract['offer_id'], 'class="date_control"'); ?><br/>
		
		<label for="text">Completion Status</label>
	    <?php echo form_dropdown('completion_status', $completion_status, $contract['completion_status'], 'class="date_control"'); ?><br/>
		
	    <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit" />
	<?php echo form_close(); ?>
</div>
