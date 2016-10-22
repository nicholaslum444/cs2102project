<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
	<div class="panel">
		<h3><strong>Task Title: </strong><?php echo $contract['title'] ?></h3>
        <p><strong>Description: </strong><em><?php echo $contract['description'] ?></em></p>
        <p><strong>Last Updated: </strong><?php echo date('d-M-Y', strtotime($contract['last_updated_datetime']))." ".date('g:i A', strtotime($contract['last_updated_datetime'])) ?></p>
        <p><strong>Current Status: </strong><?php echo $contract['completion_status'] ?></p>
	</div>
	
	<center><p>Update this contract</p><center>
	<span class="errorValidation"><?php echo validation_errors(); ?></span>
	<?php echo form_open('contract/validate_update');?>
        <center>
			<label for="text">Choose a new status:</label>
			<?php echo form_dropdown('status', $all_status, $contract['status'], 'class="date_control"'); ?><br/>
			<br>
		</center>
        <center>
			<input type="submit" 
					name="status" 
					value="SUBMIT"
			>
		</center>
    <?php echo form_close('<br>'); ?>
</div>