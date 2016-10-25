<div class="content">
  <div class="jumbotron">
    <?php echo form_open('task/available') ?>
        <?php echo form_input('search_term', set_value('search_term', ''), 'class="searchBox", placeholder="Search for tasks..."'); ?><br/>
        
        <a role="button" data-toggle="collapse" href="#advanced-search" aria-expanded="false" aria-controls="advanced-search"><strong>Search Options <i class="fa fa-chevron-down" aria-hidden="true"></i></strong></a>
        <div class="collapse" id="advanced-search">
            <div class="well">
        	    <label for="text">Search text in:</label>
                <?php echo form_dropdown('search_in', $search_in_options, set_value('search_in', 0), 'class="date_control" required'); ?><br>
                
        	    <label for="text">Category:</label>
                <?php echo form_dropdown('category', $category_options, set_value('category', ''), 'class="date_control"'); ?><br>
            
        	    <label for="text">From <small>(Date and Time)</small></label><br/>
        	    <input type="date" class="date_control" name="start_date" value="<?php echo set_value('start_date');?>">
        	    <input type="time" class="time_control" name="start_time" value="<?php echo set_value('start_time');?>"><br/>
                
        	    <label for="text">To <small>(Date and Time)</small></label><br/>
        	    <input type="date" class="date_control" name="end_date" value="<?php echo set_value('end_date');?>">
        	    <input type="time" class="time_control" name="end_time" value="<?php echo set_value('end_time');?>"><br/>
                
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
            <p>No results for your search terms! Refine your search terms and try again. Check out the search options as well!</p>
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
