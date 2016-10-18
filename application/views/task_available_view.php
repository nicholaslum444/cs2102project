<div class="content">
  <div class="jumbotron">
        <input type="text" name="search" class="searchBox" placeholder="Search..">
      </div>  

  <h1>Available Tasks</h1>
  <hr>
  <?php 
    if (!empty($available_tasks)) {
	?>
	 <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>START DATE</th>
                <th>END DATE</th>   
              </tr>
            </thead>
            <tbody>
              <tr>
              	<?php foreach ($available_tasks as $task) { ?>
                <td><?php echo $task['title']?></td>
                <td><?php echo $task['description']?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($task['start_datetime']))?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($task['end_datetime']))?></td>
                <td><a href="<?php echo base_url() ?>offer/create/<?php echo $task['id'] ?>" title="Accept"><img src="/assets/img/tick.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></td>
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
