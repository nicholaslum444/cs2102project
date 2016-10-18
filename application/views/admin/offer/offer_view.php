<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    <?php
    if (!empty($offers)) {
    ?>
     <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Task ID</th>
                <th>Task Title</th>
                <th>Offered Price</th>
                <th>Offer Creator</th>
                <th>Task Creator</th>
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
                <td><a href="/offer/update/<?php echo $offer['offer_id'] ?>"><img src="/assets/img/update.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></td>
                <td><a href="/offer/cancel/<?php echo $offer['offer_id'] ?>" onClick="javascript:return confirm('Are you sure you want to cancel <?php echo $offer['title'] ?>?')"><img src="/assets/img/cancel.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></td>
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