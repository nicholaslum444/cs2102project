<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    <?php
    if (!empty($contracts)) {
    ?>
     <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Contract ID</th>
                <th>Offer ID</th>
                <th>Contract start date</th>
                <th>Contract last updated</th>  
                <th>Contract status</th>  
				<th>Completion status</th>  
              </tr>
            </thead>
            <tbody>
              <tr>        
                <?php foreach ($contracts as $contract) { ?>
                <td><?php echo $contract['id']?></td>
                <td><?php echo $contract['offer_id']?></td>
                <td><?php echo $contract['created_datetime']?></td>
                <td><?php echo $contract['last_updated_datetime']?></td>
                <td><?php echo $contract['accepted_conditions']?></td>
				<td><?php echo $contract['status']?></td>
                <td><a href="contract/update_contract_by_id/<?php echo $contract['id'] ?>">Update</a></td>
              </tr> 
         <?php } ?>
         </tbody>
          </table>
    </div>
    <?php
    } 
    else { ?>
        <p>You have no contracts.</p>
    <?php  
    } ?> 
</div>