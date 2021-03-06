<div class="content">
    <h1><i class="fa fa-usd" aria-hidden="true"></i>&nbsp;<?php echo $header ?></h1>
    <hr>
    <!-- show the task details above the offer -->
    <div class="panel">
        <h3><strong>Task: </strong><?php echo $tasks['title'] ?></h3>
        <p><strong>Description: </strong><em><?php echo $tasks['description'] ?></em></p>
        <p><strong>Start: </strong><?php echo date('d-M-Y', strtotime($tasks['start_date']))." ".date('g:i A', strtotime($tasks['start_time'])) ?></p>
        <p><strong>End: </strong><?php echo date('d-M-Y', strtotime($tasks['end_date']))." ".date('g:i A', strtotime($tasks['end_time'])) ?></p>
    </div>
    <center><p>Make an offer for the task above!</p></center>
    <span class="errorValidation"><?php echo validation_errors(); ?></span>

    <?php echo form_open('offer/validate'); ?>
        <center><label for="text">My Price</label></center>
        <center><input type="number" step="0.01" class="date_control" name="price" ></center><br/>
        <input type="hidden" name="id" value="<?php echo $tasks['id'] ?>">
        <center><input type="submit" class="btn btn-lg btn-primary" name="submit" value="Make Offer" /></center>
    <?php echo form_close('<br>'); ?>
</div>