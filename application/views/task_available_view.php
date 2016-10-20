<div class="content">
  <div class="jumbotron">
        <input type="text" name="search" class="searchBox" placeholder="Search..">
      </div>  

  <h1><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;Available Tasks</h1>
  <hr>
  <?php 
    if (!empty($available_tasks)) {
	?>
	 <div class="col-md-6">
          <table class="table table-bordered table-hover">
            <thead>
              <tr class="info">
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>START DATE</th>
                <th>END DATE</th>   
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
              	<?php foreach ($available_tasks as $task) { ?>
                <td><?php echo $task['title']?></td>
                <td><?php echo $task['description']?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($task['start_datetime']))?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($task['end_datetime']))?></td>
                <td><a href="<?php echo base_url() ?>offer/create/<?php echo $task['id'] ?>" title="Accept"><i class="fa fa-check fa-lg" aria-hidden="true"></i></a></td>
              </tr> 
            <?php } ?>
            </tbody>
          </table>
    </div>

	<?php
	} else { ?>
		<p>There are no tasks available at the moment. Please check back again soon!</p>
	<?php	
	} ?>     
</div>
