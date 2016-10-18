<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    <?php
    if (!empty($offers)) {
    ?>
     <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr class="danger">
                <th>TASK ID</th>
                <th>TASK TITLE</th>
                <th>OFFERED PRICE</th>
                <th>OFFER CREATOR</th>
                <th>TASK CREATOR</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>        
                <?php foreach ($offers as $offer) { ?>
                <td><?php echo $offer['task_id']?></td>
                <td><?php echo $offer['title']?></td>
                <td><?php echo '$'.$offer['price']?></td>
                <td><?php echo $offer['offer_creator']?></td>
                <td><?php echo $offer['task_creator']?></td>
                <td><a href="/offer/update/<?php echo $offer['offer_id'] ?>" title="Update"><i class="fa fa-pencil fa-lg" aria-hidden="true"></a></td>
                <td><a href="/offer/cancel/<?php echo $offer['offer_id'] ?>" onClick="javascript:return confirm('Are you sure you want to cancel <?php echo $offer['title'] ?>?')" title="Delete"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></a></td>
              </tr> 
         <?php } ?>
         </tbody>
          </table>
    </div>
    <?php
    } 
    else { ?>
        <p>There are no offers at the moment.</p>
    <?php  
    } ?> 
</div>