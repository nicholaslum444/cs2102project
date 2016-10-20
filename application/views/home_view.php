<div class="content">  
    <div class="jumbotron">
        <center><h1><i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp;<?php echo $header ?></h1>
        <p class="lead">Hi there! NUSMaids works very simple. First, all you have to do is to create your task 
        by </br> submitting a request on the button below. You can also pick a task by making an offer. </p>
        <p><a class="btn btn-lg btn-info" href="/task/create" role="button">Create My Task</a></p></center>
      </div>  
    
    <div class="page-header">
        <h1><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;My Tasks</h1>
      </div>
    <?php
    if (!empty($tasks)) {
    ?>
    <div class="col-md-6">
          <table class="table table-bordered table-hover">
            <thead>
              <tr class="info">
                <th>OFFERERS</th>
                <th>MAX $</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>CATEGORY</th>
                <th>START DATE</th>
                <th>END DATE</th> 
                <th></th>
                <th></th>
                <th></th>  
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($tasks as $task) { ?>
                <td><span class="badge"><?php echo $task['offer_count']?></span></td>
                <td><span class="badge"><?php echo $task['max_offer_price']?></span></td>
                <td><?php echo $task['title']?></td>
                <td><?php echo $task['description']?></td>
                <td><?php echo $task['category']?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($task['start_datetime']))?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($task['end_datetime']))?></td>
                <td><a href="task/update/<?php echo $task['id'] ?>" title="Update"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                </a></td>
                <td><a onClick="javascript:return confirm('Are you sure you want to delete <?php echo $task['title'] ?>?')" href="task/delete/<?php echo $task['id'] ?>" title="Delete"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
                <td><a href="offer/view/<?php echo $task['id'] ?>" title="View Offers"><i class="fa fa-list-alt fa-lg" aria-hidden="true"></i></a></td>
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

