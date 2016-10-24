<div class="content">
	<h1><?php echo $header ?></h1>
    <hr>
	<div class="panel">
        <h3><strong>Task Title: </strong><?php echo $offer['title'] ?></h3>
        <p><strong>Description: </strong><em><?php echo $offer['description'] ?></em></p>
        <p><strong>Offered Price: </strong><em><?php echo $offer['price'] ?></em></p>
		<p><strong>Offered By: </strong><em><?php echo $offer['employee_username'] ?></em></p>
		<p><strong>Start: </strong><?php echo date('d-M-Y g:i A', strtotime($offer['start_datetime']))?></p>
        <p><strong>End: </strong><?php echo date('d-M-Y g:i A', strtotime($offer['end_datetime']))?></p>
    </div>

	<center><p>Accept this offer</p>
		<span class="errorValidation"><?php echo validation_errors(); ?></span>
		<?php echo form_open('contract/validate');?>
		
			<input type="hidden" name="employer_id" value="<?php echo $offer['employer_id'] ?>">
			<input type="hidden" name="acceptee_id" value="<?php echo $offer['acceptee_id'] ?>">
			<input type="hidden" name="task_id" value="<?php echo $offer['task_id'] ?>">
			<input type="hidden" name="offer_id" value="<?php echo $offer['offer_id'] ?>">
			
			<label for="text">Choose a status:</label>
			<?php echo form_dropdown('completion_status', $completion_status, ''); ?><br/>
		
			<input type="submit" class="btn btn-lg btn-success" name="submit" value="Accept" />
		<?php echo form_close('<br>'); ?>
	</center>
	
</div>