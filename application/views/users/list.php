<!DOCTYPE html>
<html>
    <head>
        <title>View Users</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/bootstrap.min.css';?>">
    </head>
    <body>
        <div class="navbar navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">Internshala</a>
            </div>
        </div>
        <div class="container" style="padding-top: 10px">
            <div class="row">    
                <div class="col-md-8">
                    <div class="row">    
                        <div class="col-6"><h3>View Users</h3></div>
                        <div class="col-6 text-right">
                            <a href="<?php echo base_url().'index.php/user/create';?>" class="btn btn-primary">Create</a>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
                        
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>IsCustomer</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php if(!empty($users)) { foreach($users as $user) {?>
                        <tr>
                            <td><?php echo $user['ID']?></td>
                            <td><?php echo $user['Email']?></td>
                            <td width="70"><?php echo $user['Password']?></td>
                            <td width="100"><?php echo $user['IsCustomer']?></td>
                            <td>
                                <a href="<?php echo base_url().'index.php/user/edit/'.$user['ID']?>" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url().'index.php/user/delete/'.$user['ID']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } } else {?>
                            <tr>
                            <td colspan="5">Records not found</td>
                        </tr>
                        <?php } ?>
                    </table>                
                </div>
            </div>
        </div>
    </body>
</html>