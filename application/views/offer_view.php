<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    <?php
    if (empty($offers)) {
    ?>
        You have not offered to help any tasks.
    <?php
    } else {
        foreach ($offers as $offer) {
    ?>
        <hr>
        <p><?php echo json_encode($offer) ?></p>
        <p><a href="offer/update/<?php echo $offer['offer_id'] ?>">Update</a></p>
        <p><a href="offer/cancel/<?php echo $offer['offer_id'] ?>">Cancel</a></p>
    <?php
        }
    }
    ?>
</div>