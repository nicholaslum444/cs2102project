<div class="content">
    <div class="jumbotron">
        <center><h1><i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp;<?php echo $header ?></h1></center>
        <center><p class="lead">Welcome. You have been assigned as an administrator. You can view all tasks, offers, contracts, and other interesting data.</p></center>
    </div> 
    
    <div class="page-header">
        <h1><i class="fa fa-users" aria-hidden="true"></i>&nbsp;All-Rounder Maids</h1>
    </div>
    
    <?php
    if (!empty($all_rounders)) {
        ?>
        <div class="col-md-6">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="info">
                        <th>USERNAME</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                        foreach ($all_rounders as $ar) { 
                            ?>
                            <td><?php echo $ar['username']?></td>
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
        <p>No all-rounders exist.</p>
        <?php  
    } 
    ?> 
</div>
