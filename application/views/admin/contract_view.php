<div class="content">
    <h1><?php echo $header ?></h1>
    <hr>
    <?php
    if (empty($contracts)) {
    ?>
        There are no contracts made yet.
    <?php
    } else {
        foreach ($contracts as $contract) {
    ?>
        <hr>
        <p><?php echo json_encode($contract) ?></p>
        <p><a href="contract/update/<?php echo $contract['contract_id'] ?>">Update</a></p>
        <p><a href="contract/cancel/<?php echo $contract['contract_id'] ?>">Cancel</a></p>
    <?php
        }
    }
    ?>
</div>