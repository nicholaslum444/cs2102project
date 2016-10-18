<div class="content">
    <div class="col-lg-12">
        <h1><?php echo $header ?></h1>
        <hr>
        
        <p>YOU ARE AN ADMIN! HERE'S A LISTING OF ALL THE OFFERS IN THE SYSTEM. <strong>CRUD</strong> ANYTHING YOU WANT.</p>
    </div>
    <?php 
    if (!empty($offers)) { 
        ?>
        <div class="col-lg-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="info">
                        <th>OFFER ID</th>
                        <th>TASK TITLE</th>
                        <th>TASK CREATOR</th>
                        <th>OFFER CREATOR</th>
                        <th>TASK PRICE</th>
                        <th>OFFERED PRICE</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>       
                    <?php 
                    foreach ($offers as $offer) { 
                        ?>
                        <tr> 
                            <td><?php echo $offer['offer_id']?></td>
                            <td><?php echo $offer['title']?></td>
                            <td><?php echo $offer['task_creator']?></td>
                            <td><?php echo $offer['offer_creator']?></td>
                            <td><?php echo '$'.$offer['task_price']?></td>
                            <td><?php echo '$'.$offer['offer_price']?></td>
                            <td><a href="/admin/offer/update/<?php echo $offer['offer_id'] ?>" title="Update"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></td>
                            <td><a href="/admin/offer/cancel/<?php echo $offer['offer_id'] ?>" onClick="javascript:return confirm('Are you sure you want to cancel Offer ID <?php echo $offer['offer_id'] ?>?')" title="Delete"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
                        </tr> 
                        <?php 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
        <?php 
    } else { 
        ?>
        <p>There are no offers at the moment.</p>
        <?php 
    } 
    ?> 
    <center><a class="btn btn-lg btn-success" role="button" href="/admin/offer/create">Create Offer</a></center>
</div>
