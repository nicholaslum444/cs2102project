<div class="row content">
    <div class="col-lg-12">
        <h1><?php echo $header ?></h1>
        <hr>
        
        <p>YOU ARE AN ADMIN! HERE'S A LISTING OF ALL THE TASKS IN THE SYSTEM. <strong>CRUD</strong> ANYTHING YOU WANT.</p>
    </div>
    <?php
    if (!empty($tasks)) {
    ?>
    <div class="col-lg-12">
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
                <td><a href="task/update/<?php echo $task['id'] ?>" title="Update"><img src="/assets/img/update.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></td>
                <td><a onClick="javascript:return confirm('Are you sure you want to delete Task ID <?php echo $task['id'] ?>?')" href="task/delete/<?php echo $task['id'] ?>" title="Delete"><img src="/assets/img/delete.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></td>
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
    <center><a class="btn btn-lg btn-success" role="button" href="/admin/task/create">Create Task</a></center>
</div>

