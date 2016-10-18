<div class="content">  
    <div class="jumbotron">
        <center><h1><?php echo $header ?></h1>
        <p class="lead">Hi there! NUSMaids works very simple. First, all you have to do is to create your task 
        by </br> submitting a request on the button below. You can also pick a task by making an offer. </p>
        <p><a class="btn btn-lg btn-success" href="/task/create" role="button">Create My Task</a></p></center>
      </div>  
    
    <div class="page-header">
        <h1>My Tasks</h1>
      </div>
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
                <td><a href="task/update/<?php echo $task['id'] ?>"><img src="/assets/img/update.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25">
                </a></td>
                <td><a onClick="javascript:return confirm('Are you sure you want to delete <?php echo $task['title'] ?>?')" href="task/delete/<?php echo $task['id'] ?>"><img src="/assets/img/delete.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></td>
                <td><a href="offer/view/<?php echo $task['id'] ?>"><img src="/assets/img/viewOffer.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></td>
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

