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
        <p><a href="contract/update/<?php echo $contract['contract_id'] ?>" title="Update"><img src="/assets/img/update.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></p>
        <p><a href="contract/cancel/<?php echo $contract['contract_id'] ?>" title="Cancel"><img src="/assets/img/cancel.png" onMouseOver="bigImg(this)" onMouseOut="normalImg(this)" width="25" height="25"></a></p>
    <?php
        }
    }
    ?>
</div>