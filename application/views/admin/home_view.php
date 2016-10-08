<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    
    <p><center><b>You are assigned as an administrator. You can view and update all tasks, offers and contracts.</center></b></p>
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
        <p>There are no tasks at the moment.</p>
    <?php  
    } ?> 
</div>

