<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    <?php
    if (empty($contracts)) {
    ?>
        You have not made any contracts yet.
    <?php
    } else {
        foreach ($contracts as $contract) {
    ?>
        <hr>
        <p><?php echo json_encode($contract) ?></p>
        <p><a href="contract/update/<?php echo $contract['contract_id'] ?>" title="Update"><i class="fa fa-pencil fa-lg" aria-hidden="true"></a></p>
        <p><a href="contract/cancel/<?php echo $contract['contract_id'] ?>" title="Delete"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></a></p>
    <?php
        }
    }
    ?>
</div>