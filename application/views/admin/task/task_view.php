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
              <tr class="danger">
                <th>TASK ID</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>START DATE</th>
                <th>END DATE</th>
                <th>CREATOR</th> 
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($tasks as $task) { ?>
                <td><?php echo $task['id']?></td>
                <td><?php echo $task['title']?></td>
                <td><?php echo $task['description']?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($task['start_datetime']))?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($task['end_datetime']))?></td>
                <td><?php echo $task['username']?></td>
                <td><a href="task/update/<?php echo $task['id'] ?>" title="Update"><i class="fa fa-pencil fa-lg" aria-hidden="true"></a></td>
                <td><a onClick="javascript:return confirm('Are you sure you want to delete Task ID <?php echo $task['id'] ?>?')" href="task/delete/<?php echo $task['id'] ?>" title="Delete"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
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
    <center><a class="btn btn-lg btn-danger" role="button" href="/admin/task/create">Create Task</a></center>
</div>

