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
		<input type="hidden" name="id" value="<?php echo $contract['id'] ?>">
        <center>
			<label for="text">Choose a new status:</label>
			<?php echo form_dropdown('completion_status', $completion_status, $contract['completion_status']); ?><br/>
		</center>
		
	    <input type="submit" class="btn btn-lg btn-success" name="submit" value="Submit" />
    <?php echo form_close('<br>'); ?>
</div>