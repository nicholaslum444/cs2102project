<div class="content">
	<h1>Offers for this Task</h1>
	<hr>
	<?php
    echo "task details:";
    echo json_encode($task); 
    if (!empty($offers)) {
	?>
	 <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Offerer</th>
                <th>Price</th>
                <th>Accept?</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              	<?php foreach ($offers as $offer) { ?>
                <td><?php echo $offer['username']?></td>
                <td><?php echo $offer['price']?></td>
                <td><a href="">Accept</a></td>
                <!-- 
                Contract parameter keys: 
                $offer['acceptee_id']
                $offer['offer_id'] -->
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
