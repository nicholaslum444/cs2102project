<div class="content">
	<h1><?php echo $header ?></h1>
  <hr>
  
  <div class="panel">
        <h3><strong>Task Title: </strong><?php echo $task['title'] ?></h3>
        <p><strong>Description: </strong><em><?php echo $task['description'] ?></em></p>
        <p><strong>Start: </strong><?php echo $task['start_datetime']; ?></p>
        <p><strong>End: </strong><?php echo $task['end_datetime']; ?></p>
    </div>
	<?php
    if (!empty($offers)) {
	?>
   <div class="offer_table">
	 <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>OFFERER</th>
                <th>PRICE</th>
                <th></th>
                <th></th>
                <th></th>
                <th>ACCEPT OFFER</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              	<?php foreach ($offers as $offer) { ?>
                <td><?php echo $offer['username']?></td>
                <td><?php echo $offer['price']?></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="" title="Accept"></a><img src="/assets/img/tick.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></td>
                <!-- 
                Contract parameter keys: 
                $offer['acceptee_id']
                $offer['offer_id'] -->
              </tr> 
            <?php } ?>
            </tbody>
          </table>
    </div>
    </div>

	<?php
	} else { ?>
		<p>There are no offers available at the moment. Please check back again soon!</p>
	<?php	
	} ?>     
</div>
