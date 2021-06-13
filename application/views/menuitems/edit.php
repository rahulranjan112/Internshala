<!DOCTYPE html>
<html>
    <head>
        <title>Update Menuitem</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/bootstrap.min.css';?>">
    </head>
    <body>
        <div class="navbar navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">Internshala</a>
            </div>
        </div>
        <div class="container" style="padding-top: 10px">
            <h3>Update Menuitem</h3>
            <hr>
            <form method="post" name="UpdateMenuitem" action="<?php echo base_url().'index.php/MenuItem/edit/'.$menuitem['ID'];?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Item</label>
                            <input type="text" name="item" id="item" value="<?php echo set_value('item', $menuitem['Item']);?>" class="form-control <?php echo (form_error('item') != "") ? 'is-invalid' : '';?>" placeholder="">
                            <p class="invalid-feedback"><?php echo strip_tags(form_error('item'));?></p>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" id="description" value="<?php echo set_value('description', $menuitem['Description']);?>" class="form-control <?php echo (form_error('description') != "") ? 'is-invalid' : '';?>" placeholder="">
                            <p class="invalid-feedback"><?php echo strip_tags(form_error('description'));?></p>
                        </div>
                        <div class="form-group">
                            <label>Cost</label>
                            <input type="text" name="cost" id="cost" value="<?php echo set_value('cost', $menuitem['Cost']);?>" class="form-control <?php echo (form_error('cost') != "") ? 'is-invalid' : '';?>" placeholder="">
                            <p class="invalid-feedback"><?php echo strip_tags(form_error('cost'));?></p>
                        </div>
                        <div class="form-group">
                            <label>Image Location</label>
                            <input type="text" name="imagelocation" id="imagelocation" value="<?php echo set_value('imagelocation', $menuitem['ImageLocation']);?>" class="form-control <?php echo (form_error('imagelocation') != "") ? 'is-invalid' : '';?>" placeholder="">
                            <p class="invalid-feedback"><?php echo strip_tags(form_error('imagelocation'));?></p>
                        </div>
                        <div class="form-group">
                            <label>Item Available</label>
                            <input type="text" name="itemavailable" id="itemavailable" value="<?php echo set_value('itemavailable', $menuitem['ItemAvailable']);?>" class="form-control <?php echo (form_error('itemavailable') != "") ? 'is-invalid' : '';?>" placeholder="">
                            <p class="invalid-feedback"><?php echo strip_tags(form_error('itemavailable'));?></p>
                        </div>
                        <div class="form-group">
                            <label>IsVegetarian</label>
                            <input type="text" name="isvegetarian" id="isvegetarian" value="<?php echo set_value('isvegetarian', $menuitem['IsVegetarian']);?>" class="form-control <?php echo (form_error('isvegetarian') != "") ? 'is-invalid' : '';?>" placeholder="">
                            <p class="invalid-feedback"><?php echo strip_tags(form_error('isvegetarian'));?></p>
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" name="course" id="course" value="<?php echo set_value('course', $menuitem['Course']);?>" class="form-control <?php echo (form_error('course') != "") ? 'is-invalid' : '';?>" placeholder="">
                            <p class="invalid-feedback"><?php echo strip_tags(form_error('course'));?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-primary">Update</button>
                            <a href="<?php echo base_url().'index.php/restaurant/index'?>" class="btn-secondary btn">Cancel</a>
                        </div>
                    </div> 
                </div>
            </form>
        </div>
    </body>
</html>