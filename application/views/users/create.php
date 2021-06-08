<!DOCTYPE html>
<html>
    <head>
        <title>Create User</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/bootstrap.min.css';?>">
    </head>
    <body>
        <div class="navbar navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">Internshala</a>
            </div>
        </div>
        <div class="container" style="padding-top: 10px">
            <h3>Create User</h3>
            <hr>
            <form method="post" name="createUser" action="<?php echo base_url().'index.php/user/create';?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="<?php echo set_value('email');?>" class="form-control">
                            <?php echo form_error('email');?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="<?php echo set_value('password');?>" class="form-control">
                            <?php echo form_error('password');?>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-primary">Create</button>
                            <a href="" class="btn-secondary btn">Cancel</a>
                        </div>
                    </div> 
                </div>
            </form>
        </div>
    </body>
</html>