<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/bootstrap.css';?>">
        <title>Restaurant Registeration</title>              
    </head>
    <body>        
          <div class="container mb-20">
            <?php
                $msg = $this->session->flashdata('msg');
                if($msg != "" and $msg != "login") {
                    echo "<div class='alert alert-success'>$msg</div>";
                }
                ?>
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-header">
                            Register Here
                        </div>
                        <form action="<?php echo base_url().'index.php/restaurant/register';?>" method="post" name="restaurantregisterForm" id="restaurantregisterForm">            
                            <div class="card-body">                    
                                <p class="card-text">Please fill with your details</p>
                                <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" value="<?php echo set_value('name');?>" class="form-control <?php echo (form_error( field: 'name') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error( field: 'name'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" id="address" value="<?php echo set_value('address');?>" class="form-control <?php echo (form_error( field: 'address') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error( field: 'address'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input type="text" name="mobileno" id="mobileno" value="<?php echo set_value('mobileno');?>" class="form-control <?php echo (form_error( field: 'mobileno') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error( field: 'mobileno'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Opening Time</label>
                                        <input type="time" name="opening_time" id="opening_time" value="<?php echo set_value('opening_time');?>" class="form-control <?php echo (form_error( field: 'opening_time') != "") ? 'is-invalid' : '';?>" placeholder="">                                        
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error( field: 'opening_time'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Opening Time</label>
                                        <input type="time" name="closing_time" id="closing_time" value="<?php echo set_value('closing_time');?>" class="form-control <?php echo (form_error( field: 'closing_time') != "") ? 'is-invalid' : '';?>" placeholder="">                                        
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error( field: 'closing_time'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" value="<?php echo set_value('email');?>" class="form-control <?php echo (form_error( field: 'email') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error( field: 'email'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" value="<?php echo set_value('password');?>" class="form-control <?php echo (form_error( field: 'password') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error( field: 'password'));?></p>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button class="btn btn-block btn-primary">REGISTER NOW</button>                            
                                    </div>

                                    <div class="mt-3">
                                        <a href="<?php echo base_url().'index.php/user/login';?>">Login here</a>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
          </div>
    </body>
</html>