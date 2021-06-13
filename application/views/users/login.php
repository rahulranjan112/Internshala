<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/bootstrap.css';?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/style.css';?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/login.css';?>">
        <title>Login</title>              
    </head>
    <body>        
        <form class="form-signin" action="<?php echo base_url().'index.php/user/login';?>" method="post" name="frm" id="frm">            
            
            <?php
            $msg = "";
            $msg = $this->session->flashdata('msg');
            if($msg != "" and $msg != "login") {
            ?>
                <div class="alert alert-danger">
                    <?php echo $msg;?>
                </div>
            <?php 
            }
            ?>
            
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

            <div class="form-floating">
            <input type="text" id="email" name="email" class="form-control <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" id="floatingInput" placeholder="name@example.com" value="<?php echo set_value('email');?>">
            <label for="floatingInput">Email address</label>
            <p class="invalid-feedback"><?php echo strip_tags(form_error('email'));?></p>
            </div>

            <div class="form-floating">
            <input type="password" id="password" name="password" class="form-control <?php echo (form_error('password') != "") ? 'is-invalid' : '';?>" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            <p class="invalid-feedback"><?php echo strip_tags(form_error('password'));?></p>
            </div>    

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

            <div class="mt-3">
                <a href="<?php echo base_url().'index.php/customer/register';?>">Customer Registration</a>
            </div>
            <div class="mt-3">
                <a href="<?php echo base_url().'index.php/restaurant/register';?>">Restaurant Registration</a>
            </div>
        </form>    
    </body>
</html>