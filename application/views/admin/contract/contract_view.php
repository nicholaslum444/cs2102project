<div class="content">
    <div class="col-lg-12">
        <h1><?php echo $header ?></h1>
        <hr>
        
        <p>YOU ARE AN ADMIN! HERE'S A LISTING OF ALL THE CONTRACTS IN THE SYSTEM. <strong>CRUD</strong> ANYTHING YOU WANT.</p>
    </div>
    <?php 
    if (!empty($contracts)) { 
        ?>
        <div class="col-lg-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="info">
                        <th>CONTRACT ID</th>
                        <th>TASK</th>
                        <th>EMPLOYER</th>
                        <th>EMPLOYEE</th>
                        <th>AGREED PRICE</th>
                        <th>COMPLETION STATUS</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>       
                    <?php 
                    foreach ($contracts as $contract) { 
                        ?>
                        <tr> 
                            <td><?php echo $contract['id']?></td>
                            <td><?php echo $contract['title']?></td>
                            <td><?php echo $contract['employer_username']?></td>
                            <td><?php echo $contract['employee_username']?></td>
                            <td><?php echo '$'.$contract['price']?></td>
                            <td><?php echo $contract['completion_status']?></td>
                            <td><a href="/admin/contract/update/<?php echo $contract['id'] ?>" title="Update"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></td>
                            <td><a href="/admin/contract/delete/<?php echo $contract['id'] ?>" onClick="javascript:return confirm('Are you sure you want to cancel Contract ID <?php echo $contract['id'] ?>?')" title="Delete"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
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
        <div class="col-lg-12">
            <p>There are no contracts at the moment.</p>
        </div>
        <?php 
    } 
    ?> 
    <center><a class="btn btn-lg btn-success" role="button" href="/admin/contract/create">Create Contract</a></center>
</div>
