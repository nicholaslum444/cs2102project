<div class="content">
  <div class="jumbotron">
    <?php echo form_open('task/available') ?>
        <input type="text" required name="search" class="searchBox" placeholder="Search for tasks..." value="<?php echo $search_term ?>">
        <br>
        <a role="button" data-toggle="collapse" href="#advanced-search" aria-expanded="false" aria-controls="advanced-search"><strong>Advanced Search</strong></a>
        <div class="collapse" id="advanced-search">
            <div class="well">
        	    <label for="text">Search in:</label>
                <?php echo form_dropdown('search-in', $search_in_options, $search_in ? $search_in : 0, 'class="date_control" required'); ?>
                <br>
                <input type="submit" class="btn btn-success" name="submit" value="Search" />
            </div>
        </div>
    <?php echo form_close() ?>
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
                <th>CREATOR</th>
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
                <td><?php echo $task['task_creator']?></td>
                <td><a href="<?php echo base_url() ?>offer/create/<?php echo $task['id'] ?>" title="Accept"><i class="fa fa-check fa-lg" aria-hidden="true"></i></a></td>
              </tr> 
            <?php } ?>
            </tbody>
          </table>
    </div>

	<?php
	} else { ?>
        <?php 
        if ($search_term) { 
            ?>
            <p>No results for <?php echo $search_term ?>! Refine your search terms and try again.</p>
            <?php 
        } else { 
            ?>        
            <p>There are no tasks available at the moment. Please check back again soon!</p>
            <?php 
        } 
        ?>
	<?php	
	} ?>     
</div>
