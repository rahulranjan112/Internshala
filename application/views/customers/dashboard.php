<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/bootstrap.css';?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'Include/css/style.css';?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <title>Customer Dashboard</title>              
    </head>
    <body>  
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container">                
                    <a class="navbar-brand" href="#">Internshala</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="col-md-0 text-right text-white">Welcome, <?php echo $user['Name'];//isset($customer['Name']) ? $customer['Name'] : $user['Email'];//$this->session->userdata('user')['Email'];?> <a href="<?php echo base_url().'index.php/customer/logout';?>" class="nav-item text-white">Logout</a></div>                
                </div>
            </nav>
        </header>    
        <div class="container" style="padding-top: 70px">
                       
        <div class="row">    
                <div class="col-md-15">
                    <div class="row">    
                        <div class="col-10"><h3>Menu</h3></div>
                        
                    </div>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-15">
                    <p><?php echo $this->session->flashdata('success');?></p>
                <form method="post" name="addorder" action="<?php echo base_url().'index.php/order/create';?>">
                    <table class="table table-striped"  id="Table1">
                        <tr>
                            <th>Restaurant Name</th>
                            <th>Item</th>
                            <th>Cost</th>
                            <th>IsVegetarian</th>
                            <th>Course</th>
                            <th>Order Items</th>
                        </tr>

                        <?php if(!empty($menuitems)) { foreach($menuitems as $menuitem) {?>
                            
                        <tr>
                        <input type='hidden' name='Item_ID[]' value="<?php echo $menuitem['ID']?>">
                        <input type='hidden' name='Restaurant_ID[]' value="<?php echo $menuitem['Restaurant_ID']?>">
                            <td><?php echo $menuitem['Name']?><input type="hidden" name='Name[]' value="<?php echo $menuitem['Name']?>"></td>
                            <td><?php echo $menuitem['Item']?><input type="hidden" name='Item[]' value="<?php echo $menuitem['Item']?>"></td>
                            <td><?php echo $menuitem['Cost']?><input type="hidden" name='Cost[]' value="<?php echo $menuitem['Cost']?>"></td>
                            <td><?php echo $menuitem['IsVegetarian']?><input type="hidden" name='IsVegetarian[]' value="<?php echo $menuitem['IsVegetarian']?>"></td>
                            <td><?php echo $menuitem['Course']?><input type="hidden" name='Course[]' value="<?php echo $menuitem['Course']?>"></td>
                            <td>
                                <!-- <button type="button" name="add_cart" class="btn btn-success add_cart">Add to Cart</button> -->
                                <!-- <button class="btn btn-primary">Add</button> -->
                                <input type="checkbox" id="Add" name="Add[]"/>
                                <input type="hidden" id="AddVal" name="AddVal[]" value="0"/>
                            </td>  
                                     
                        </tr>
                        
                        <?php } } else {?>
                            <tr>
                            <td colspan="5">Records not found</td>
                        </tr>
                        <?php } ?>
                         
                    </table>    
                    
                        <button class="btn btn-primary">Order</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>


<script>
    $('input[type="checkbox"]').on('change', function(e){
        if($(this).prop('checked'))
        {
            $(this).next().val(1);
            // var message = "";

            // //Loop through all checked CheckBoxes in GridView.
            // $("#Table1 input[type=checkbox]:checked").each(function () {
            //     var row = $(this).closest("tr")[0];
            //     if(message == "") {
            //         message = row.cells[0].innerText;
            //     } 
            //     else{
            //         if (message != row.cells[0].innerText){
            //             $(this).next().val(0);
            //         }
            //     }
            // });

            // alert(message);
        } else {
            $(this).next().val(0);
        }
});
</script>
<!-- <script>
    //$(document).ready(function(){
        $('.add_cart').click(function(){
            //var date = $(this).data("productid");
            var customer_id = $(this).data("productname");
            var restaurant_id = $(this).data("price");
            var quantity = 1;//$('#' + product_id).val();
            if(quantity != '' && quantity > 0)
            {
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/Order/create",
                method:"POST",
                data:{customer_id:customer_id, restaurant_id:restaurant_id, quantity:quantity},
                success:function(data)
                {
                    alert("Product Added into Cart");
                    $('#cart_details').html(data);
                    //$('#' + product_id).val('');
                }
            });
            }
            else
            {
                error: (error) => {
                     console.log(JSON.stringify(error));
   }
                alert("Please Enter quantity");
            }
        });
    //});
</script> -->