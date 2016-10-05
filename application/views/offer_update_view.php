<div class="content">
		<h1><?php echo $header ?></h1>
		<hr>
		<span class="errorValidation"><?php echo validation_errors(); ?></span>

		<?php echo form_open('offer/validate_update'); ?>
	    <input type="input" class="form_control" name="title" placeholder="Title of your task" value="<?php echo $offers['title'] ?>" readonly /><br/>

	    <textarea type="input" class="textarea_control" name="description" placeholder="Description of your task" readonly /><?php echo $offers['description'] ?></textarea><br/>

	    <center><label for="text">Enter your start date and time</label></center>
	    <input type="date" class="form_control" name="start_date" value="<?php echo $offers['start_date'] ?>" readonly ><br/>
	    <input type="time" class="form_control" name="start_time" value="<?php echo $offers['start_time'] ?>" readonly ><br/>

	    <center><label for="text">Enter your end date and time</label></center>
	    <input type="date" class="form_control" name="end_date"  value="<?php echo $offers['end_date'] ?>" readonly ><br/>
	    <input type="time" class="form_control" name="end_time" value="<?php echo $offers['end_time'] ?>" readonly ><br/>
	    <br/>
	    
	    <center><label for="text">My Price</label></center>
	    <input type="number" step="0.01" class="form_control" name="price" value="<?php echo $offers['price'] ?>"><br/>
	    <input type="hidden" name="id" value="<?php echo $offers['id'] ?>">
	    
	    <center><input type="submit" class="btn btn-lg btn-primary" name="submit" value="Update Offer" /></center>
	    <?php echo form_close('<br>'); ?>
</div>