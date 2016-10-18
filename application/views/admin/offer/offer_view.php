<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    
    <p>YOU ARE AN ADMIN! HERE'S A LISTING OF ALL THE OFFERS IN THE SYSTEM. <strong>CRUD</strong> ANYTHING YOU WANT.</p>
    <?php
    if (!empty($offers)) {
    ?>
     <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Task ID</th>
                <th>Task Title</th>
                <th>Task Creator</th>
                <th>Offer Creator</th>
                <th>Offered Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>        
                <?php foreach ($offers as $offer) { ?>
                <td><?php echo $offer['task_id']?></td>
                <td><?php echo $offer['title']?></td>
                <td><?php echo $offer['task_creator']?></td>
                <td><?php echo $offer['offer_creator']?></td>
                <td><?php echo '$'.$offer['price']?></td>
                <td><a href="/admin/offer/update/<?php echo $offer['offer_id'] ?>"><img src="/assets/img/update.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></td>
                <td><a href="/admin/offer/cancel/<?php echo $offer['offer_id'] ?>" onClick="javascript:return confirm('Are you sure you want to cancel <?php echo $offer['title'] ?>?')"><img src="/assets/img/cancel.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></td>
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
    <center><a class="btn btn-lg btn-success" role="button" href="/admin/offer/create">Create Offer</a></center>
</div>
