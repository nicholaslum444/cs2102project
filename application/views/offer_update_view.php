<div class="content">
		<h1><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;<?php echo $header ?></h1>
		<hr>
        
		<div class="panel">
        <h3><strong>Task Title: </strong><?php echo $offers['title'] ?></h3>
        <p><strong>Description: </strong><em><?php echo $offers['description'] ?></em></p>
        <p><strong>Start: </strong><?php echo date('d-M-Y', strtotime($offers['start_date']))." ".date('g:i A', strtotime($offers['start_time'])) ?></p>
        <p><strong>End: </strong><?php echo date('d-M-Y', strtotime($offers['end_date']))." ".date('g:i A', strtotime($offers['end_time'])) ?></p>
    </div>
    <center><p>Update my offer for the task above!</p></center>
    <span class="errorValidation"><?php echo validation_errors(); ?></span>

    <?php echo form_open('offer/validate_update'); ?>
        <center><label for="text">My Price</label></center>
        <center><input type="number" step="0.01" class="date_control" name="price" value="<?php echo $offers['price'] ?>"></center><br/>
        <input type="hidden" name="id" value="<?php echo $offers['offer_id'] ?>">
        <center><input type="submit" class="btn btn-lg btn-primary" name="submit" value="Update Offer" /></center>
    <?php echo form_close('<br>'); ?>
</div>