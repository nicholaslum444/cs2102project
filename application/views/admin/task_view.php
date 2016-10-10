<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    
    <p>YOU ARE AN ADMIN! HERE'S A LISTING OF ALL THE TASKS IN THE SYSTEM. CRUD ANYTHING YOU WANT.</p>
    <?php
    if (!empty($tasks)) {
    ?>
    <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Task ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Creator</th> 
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($tasks as $task) { ?>
                <td><?php echo $task['id']?></td>
                <td><?php echo $task['title']?></td>
                <td><?php echo $task['description']?></td>
                <td><?php echo $task['start_datetime']?></td>
                <td><?php echo $task['end_datetime']?></td>
                <td><?php echo $task['username']?></td>
                <td><a href="task/update/<?php echo $task['id'] ?>">Update</a></td>
                <td><a href="task/delete/<?php echo $task['id'] ?>">Delete</a></td>
              </tr> 
            <?php } ?>
            </tbody>
          </table>
    </div>
    <?php
    } 
    else { ?>
        <p>You have no tasks at the moment. Please create one.</p>
    <?php  
    } ?> 
    <a class="btn btn-success" href="/admin/task/create">Create Task</a>
</div>

