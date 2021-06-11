<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/bootstrap.css';?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/style.css';?>">
        <title>Restaurant Dashboard</title>              
    </head>
    <body>  
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container">                
                    <a class="navbar-brand" href="#">Internshala</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="col-md-0 text-right text-white">Welcome, <?php  echo $user['Name'];//$this->session->userdata('user')['Email'];?> <a href="<?php echo base_url().'index.php/customer/logout';?>" class="nav-item text-white">Logout</a></div>                
                </div>
            </nav>
        </header>    
        <div class="container" style="padding-top: 70px">
            <div class="row">    
                <div class="col-md-15">
                    <div class="row">    
                        <div class="col-8"><h3>Menu Items</h3></div>
                        <div class="col-2 text-right">
                            <a href="<?php echo base_url().'index.php/restaurant/vieworders/'.$restaurant['ID'];?>" class="btn btn-primary">View Orders</a>
                        </div>
                        <div class="col-2 text-right">
                            <a href="<?php echo base_url().'index.php/menuitem/create';?>" class="btn btn-primary">Create</a>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
                        
            <div class="row">
                <div class="col-md-15">
                    <table class="table table-striped">
                        <tr>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Cost</th>
                            <th>ImageLocation</th>
                            <th>ItemAvailable</th>
                            <th>IsVegetarian</th>
                            <th>Course</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php if(!empty($menuitems)) { foreach($menuitems as $menuitem) {?>
                        <tr>
                            <td><?php echo $menuitem['Item']?></td>
                            <td><?php echo $menuitem['Description']?></td>
                            <td><?php echo $menuitem['Cost']?></td>
                            <td><?php echo $menuitem['ImageLocation']?></td>
                            <td><?php echo $menuitem['ItemAvailable']?></td>
                            <td><?php echo $menuitem['IsVegetarian']?></td>
                            <td><?php echo $menuitem['Course']?></td>
                            <td>
                                <a href="<?php echo base_url().'index.php/menuitem/edit/'.$menuitem['ID']?>" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url().'index.php/menuitem/delete/'.$menuitem['ID']?>" class="btn btn-danger">Delete</a>
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