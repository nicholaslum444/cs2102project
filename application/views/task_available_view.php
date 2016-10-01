<div>
	<h1>Available Tasks</h1>
	<?php 
		if (!empty($available_tasks)) {
	?>
	<p>Here is a list of available tasks:</p>

	<?php 	
		foreach ($available_tasks as $task) { ?>
		<hr>
        <p><?php echo json_encode($task) ?></p>
        <p><a href="<?php echo base_url() ?>offer/create/<?php echo $task['id'] ?>">Accept</a></p>
    		
	<?php
		} 

	} else {
	?>
		<p>There are no available at the moment tasks.</p>
	<?php	
	} 
	?>     
</div>
