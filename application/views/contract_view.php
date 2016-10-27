<div class="content">
    <h1><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;<?php echo $header ?></h1>
    <hr>
    <?php
    if (!empty($contracts)) {
    ?>
     <div class="col-md-6">
          <table class="table table-bordered table-hover">
            <thead>
              <tr class="info">             
        				<th>EMPLOYER</th>
        				<th>EMPLOYEE</th>
        				<th>TASK TITLE</th>
                <th>START DATE</th>
                <th>LAST UPDATED</th>  
                <th>COMPLETION STATUS</th>  
				        <th></th>  
              </tr>
            </thead>
            <tbody>
              <tr>        
                <?php foreach ($contracts as $contract) { ?>      
				        <td><?php echo $contract['employer_username']?></td>
				        <td><?php echo $contract['employee_username']?></td>
				        <td><?php echo $contract['title']?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($contract['created_datetime']))?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($contract['last_updated_datetime']))?></td>
                <td><?php echo $contract['completion_status']?></td>
                <td><a href="contract/update/<?php echo $contract['id'] ?>" title="Update Status"><i class="fa fa-pencil fa-lg" aria-hidden="true"></a></td>

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