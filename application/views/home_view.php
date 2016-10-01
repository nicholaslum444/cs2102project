<div id="regHeader">
    <div id="mainBody">
    <h1><?php echo $header ?></h1>
    
    <br/>
    <p>Welcome to CS2102 NUS Maids.</p>
    <?php //<p>Your username is <strong><?php echo $username </strong> and your user id is <?php echo $user_id </p>?>
    
	<div>
        <p>This is a listing of all of your tasks:</p>
        <?php foreach ($tasks as $task) { ?>
            <hr>
            <p><?php echo json_encode($task) ?></p>
            <p><a href="task/update/<?php echo $task['id'] ?>">Update</a></p>
             <p><a href="task/delete/<?php echo $task['id'] ?>">Delete</a></p>
        <?php } ?>

        <hr><br/>
        <a href="task/create">Add Task</a>
        <!-- My offer to help other's tasks -->
        <a href="offer">My Offers</a> 
        <!-- View other's Tasks -->
        <a href="task/available">Help Others</a>
	</div>
    </div>
</div>