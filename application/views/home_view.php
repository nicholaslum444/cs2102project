<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    <br/>
    <p>Welcome to CS2102 NUS Maids.</p>
    
    <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>   
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
                <td><a href="task/update/<?php echo $task['id'] ?>">Update</a></td>
                <td><a href="task/delete/<?php echo $task['id'] ?>">Delete</a></td>
              </tr> 
            <?php } ?>
            </tbody>
          </table>
    </div>
</div>

