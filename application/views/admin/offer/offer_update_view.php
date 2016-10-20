<div class="content">
	<h1><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;<?php echo $header ?></h1>
	<hr>
	<div class="taskErrorValidation"><?php echo validation_errors(); ?></div>

	<?php echo form_open('admin/offer/validate_update'); ?>
		<?php echo form_hidden('offer_id', $offer['offer_id']) ?>
		
	    <label for="text">Task</label>
	    <?php echo form_dropdown('task_id', $all_task_titles, $offer['task_id'], 'class="date_control"'); ?>
        <br>
		
        <label for="text">Offer Price</label>
		<?php echo form_input(['name'=>'price', 'value'=>$offer['price'], 'type'=>'number', 'step'=>'0.01', 'class'=>'date_control']); ?>
		<br>
		
		<label for="text">Offer Creator</label>
	    <?php echo form_dropdown('creator_id', $all_usernames, $offer['acceptee_id'], 'class="date_control"'); ?>
		
	    <br/>
	    <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit" />
	<?php echo form_close(); ?>
</div>
