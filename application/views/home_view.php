<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    
    <?php
    if (!empty($tasks)) {
    ?>
    <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>   
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($tasks as $task) { ?>
                <td><?php echo $task['title']?></td>
                <td><?php echo $task['description']?></td>
                <td><?php echo $task['start_datetime']?></td>
                <td><?php echo $task['end_datetime']?></td>
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
</div>

