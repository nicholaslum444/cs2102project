<div class="content">
    <h1><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;<?php echo $header ?></h1>
    <hr>
    <?php
    if (!empty($offers)) {
    ?>
     <div class="col-md-6">
          <table class="table table-bordered table-hover">
            <thead>
              <tr class="info">
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>START DATE</th>
                <th>END DATE</th>  
                <th>PRICE</th>  
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>        
                <?php foreach ($offers as $offer) { ?>
                <td><?php echo $offer['title']?></td>
                <td><?php echo $offer['description']?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($offer['start_datetime']))?></td>
                <td><?php echo date('d-M-Y g:i A', strtotime($offer['end_datetime']))?></td>
                <td><?php echo $offer['price']?></td>
                <td><a href="offer/update/<?php echo $offer['offer_id'] ?>" title="Update"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></td>
                <td><a onClick="javascript:return confirm('Are you sure you want to cancel <?php echo $offer['title'] ?>?')" href="offer/cancel/<?php echo $offer['offer_id'] ?>" title="Cancel"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
              </tr> 
         <?php } ?>
         </tbody>
          </table>
    </div>
    <?php
    } 
    else { ?>
        <p>You have not offered to help any tasks.</p>
    <?php  
    } ?> 
</div>