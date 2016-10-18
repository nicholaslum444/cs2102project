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
				<th>Employer</th>
				<th>Employee</th>
				<th>Task ID</th>
                <th>Offer ID</th>
                <th>Contract Start Date</th>
                <th>Contract Last Updated</th>  
                <th>Contract Status</th>  
				<th>Completion status</th>  
              </tr>
            </thead>
            <tbody>
              <tr>        
                <?php foreach ($contracts as $contract) { ?>
                <td><?php echo $contract['id']?></td>
				<td><?php echo $contract['employer_id']?></td>
				<td><?php echo $contract['employee_id']?></td>
				<td><?php echo $contract['task_id']?></td>
                <td><?php echo $contract['offer_id']?></td>
                <td><?php echo $contract['created_datetime']?></td>
                <td><?php echo $contract['last_updated_datetime']?></td>
				<td><?php echo $contract['completion_status']?></td>
                <td><a href="contract/update_contract_by_id/<?php echo $contract['id'] ?>"><img src="/assets/img/update.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></td>
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