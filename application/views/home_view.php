<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    <br/>
    <p>Welcome to CS2102 NUS Maids.</p>
    
        <p>This is a listing of all of your tasks:</p>
        <?php foreach ($tasks as $task) { ?>
        
            <p><?php echo json_encode($task) ?></p>
            <p><a href="task/update/<?php echo $task['id'] ?>">Update</a></p>
             <p><a href="task/delete/<?php echo $task['id'] ?>">Delete</a></p>
        <?php } ?>
</div>