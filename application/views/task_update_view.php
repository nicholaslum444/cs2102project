<div class="content">
		<h1><?php echo $header ?></h1>
		<hr>
		<div class="taskErrorValidation"><?php echo validation_errors(); ?></div>

		<?php echo form_open('task/validate_update'); ?>
	    <label for="text">Task Title</label>
	    <input type="input" class="title_control" name="title" value="<?php echo $tasks['title'] ?>" /><br/>

	    <label for="text">Task Description</label>
	    <textarea type="input" class="textarea_control" name="description"><?php echo $tasks['description'] ?></textarea><br/>

	    <label for="price">My Price</label>
	    <input type="number" step="0.01" class="date_control" name="price" value="<?php echo $tasks['price'] ?>"><br/>

	    <label for="category">Category</label>
	    <select name="category">
			<option value="1" 

			<?php echo $tasks['category'] == 'DELIVERY' ? 
			' selected="selected"' : '' ?>
			>DELIVERY</option> 
			<option value="2"
			<?php echo $tasks['category'] == 'CLEANING' ? 
			' selected="selected"' : '' ?>
			>CLEANING</option>
			<option value="3"
			<?php echo $tasks['category'] == 'HANDYMAN' ? 
			' selected="selected"' : '' ?>
			>HANDYMAN</option>
			<option value="4" 
			<?php echo $tasks['category'] == 'MOVING' ? 
			' selected="selected"' : '' ?>
			>MOVING</option>
		</select><br/>

	    <label for="text">Start Date and Time</label><br/>
	    <input type="date" class="date_control" name="start_date" value="<?php echo $tasks['start_date'] ?>">
	    <input type="time" class="time_control" name="start_time" value="<?php echo $tasks['start_time'] ?>"><br/>

	    <label for="text">Enter your end date and time</label><br/>
	    <input type="date" class="date_control" name="end_date"  value="<?php echo $tasks['end_date'] ?>">
	    <input type="time" class="time_control" name="end_time" value="<?php echo $tasks['end_time'] ?>"><br/>

	    <br/>
	    <input type="hidden" name="id" value="<?php echo $tasks['id'] ?>">
	    <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit" />
	    <?php echo form_close('<br>'); ?>
</div>