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
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>  
                <th>Price</th>  
              </tr>
            </thead>
            <tbody>
              <tr>        
                <?php foreach ($offers as $offer) { ?>
                <td><?php echo $offer['title']?></td>
                <td><?php echo $offer['description']?></td>
                <td><?php echo $offer['start_datetime']?></td>
                <td><?php echo $offer['end_datetime']?></td>
                <td><?php echo $offer['price']?></td>
                <td><?php echo $offer['offer_creator']?></td>
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