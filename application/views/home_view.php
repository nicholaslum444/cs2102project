<div id="regHeader">
    <div id="mainBody">
    <h1><?php echo $header ?></h1>
    
    <br/><br/>
    <p>This is a test page. Welcome to CS2102 NUS Maids.</p>
    <p>Your username is <strong><?php echo $username ?></strong> and your user id is <?php echo $user_id ?></p>
    
	<div>
        <p>This is a listing of all the tasks in the system:</p>
        <?php foreach ($tasks as $task) { ?>
            <p><?php echo json_encode($task) ?></p>
        <?php } ?>
        <p>Thank you for your time.</p>

        <a href="task/create">Add Task</a>
	</div>
    
    <a href="logout">CLICK ME TO LOGOUT</a>
    </div>
</div>