<div>
	<h1><?php echo $header ?></h1>
	<hr>
	<?php echo validation_errors(); ?>

	<?php echo form_open('task/validate'); ?>

	    <label for="title">Title</label><br />
	    <input type="input" name="title" /><br />

	    <label for="description">Describe your task!</label><br />
	    <textarea type="input" name="description"></textarea><br />

	    <label for="text">Start On</label><br />
	    <input type="date" name="start_date">
	    <input type="time" name="start_time"><br />

	    <label for="text">End By</label><br />
	    <input type="date" name="end_date">
	    <input type="time" name="end_time"><br />

	    <input type="submit" name="submit" value="Create Task" />

	</form>
</div>