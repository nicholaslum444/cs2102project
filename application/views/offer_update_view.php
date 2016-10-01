<div id="regHeader"><br/><br/><br/>
    <div id="regBody"><br/>
		<h1><?php echo $header ?></h1>
		<span class="errorValidation"><?php echo validation_errors(); ?></span>

		<?php echo form_open('offer/validate_update'); ?>
	    <input type="input" class="form-control" name="title" placeholder="Title of your task" value="<?php echo $offers['title'] ?>" readonly /><br/>

	    <textarea type="input" class="textarea-control" name="description" placeholder="Description of your task" readonly /><?php echo $offers['description'] ?></textarea><br/>

	    <label for="text">Enter your start date and time</label><br/>
	    <input type="date" class="form-control" name="start_date" value="<?php echo $offers['start_date'] ?>" readonly ><br/>
	    <input type="time" class="form-control" name="start_time" value="<?php echo $offers['start_time'] ?>" readonly ><br/>

	    <label for="text">Enter your end date and time</label><br/>
	    <input type="date" class="form-control" name="end_date"  value="<?php echo $offers['end_date'] ?>" readonly ><br/>
	    <input type="time" class="form-control" name="end_time" value="<?php echo $offers['end_time'] ?>" readonly ><br/>
	    <br/>
	    <label for="text">My Price</label><br/>
	    <input type="number" step="0.01" class="form-control" name="price" value="<?php echo $offers['price'] ?>"><br/>
	    <input type="hidden" name="id" value="<?php echo $offers['id'] ?>">
	    <input type="submit" class="alignSignUpButton" name="submit" value="Update Offer" />
	    <?php echo form_close('<br>'); ?>
	</div>
</div>