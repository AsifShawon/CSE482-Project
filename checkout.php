<?php 
// Database configuration 
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'learntoprotect'); 

// Connect with the database 
$con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
 
// Check connection 
if ($con->connect_error) { 
   die("Connection failed: " . $con->connect_error); 
}
?>
Create Add to cart or Buy Product
Create Product list or add to card list in our project for e-commerce feature then buy a product using Paypal payment gateway. We have created an index.php file for product listing for add to card or buy now.

index.php

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Paypal Payment Gateway Integration in PHP Step by Step</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">     
    </head>
<body>
    <div class="container" style="background:#f2f2f2;padding: 50px;">
        <div class="py-5 text-center">
            <h2> Products List (Paypal Payment Gateway Integration) </h2>
        </div>
        <div class="row">
            <?php
               // Include configuration  
                require "inc/config.php";           

                $sql = "SELECT * FROM products WHERE status = '1' order by id DESC";
                $query = $con->query($sql);
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {

            ?>
            <div class="col-md-4">
                <div class="card" style="height: 543px;">
                    <img src="images/<?php echo $row['image']?>" style="width:325px; height: 250px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['product_name']?></h5>
                        <p class="card-text"><?php echo $row['description']?></p>
                        <a href="checkout.php?product_id=<?php echo $row['id']?>" class="btn btn-sm btn-primary">Buy Now</a> 
                        <b><span style="float: right;"> $<?php echo $row['price']?></span></b>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</body>
</html>


<?php

   // Include configuration  
   require "inc/config.php";

   if (!empty($_GET['product_id']) && isset($_GET['product_id'])) {
      $pid = $_GET['product_id'];
   }

   $sql = "SELECT * FROM products WHERE id = $pid";
   $query = $con->query($sql);

   if ($count = $query->num_rows > 0) {

      $row = $query->fetch_assoc();
   }

?>

<!DOCTYPE html>
<html lang="">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Paypal Payment Gateway Integration in PHP Step by Step</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
   </head>
<body>
<div class="container" style="background: #f2f2f2; padding-bottom:20px; border: 1px solid #d9d9d9; border-radius: 5px;">
   <div class="py-5 text-center">
      <h2> Paypal Payment Gateway Integration Checkout</h2>
      <p class="lead">This Checkout page using Paypal Payment Gateway for Testing purpose </p>
   </div>
   <form action="pay.php" method="POST">
      <div class="row">
         <div class="col-md-8">
            <h4>Billing address</h4>
            <div class="card p-3">
               <div class="mb-3">
                  <label for="firstName">Full Name </label>
                  <input type="text" id="name" class="form-control" name="full_name" placeholder="Full Name" required="">
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <label for="mobile">Mobile Number</label>                        
                     <input type="text" id="phone" class="form-control" name="phone" placeholder="Mobile Number" required="">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="email">Email </label>
                     <input type="email" id="email" class="form-control" name="email_address" placeholder="Email">
                  </div>
               </div>
               <div class="mb-3">
                  <label for="address">Flat, House no. Area, Street, Sector, Village</label>
                  <input type="text" id="address" class="form-control" name="address" placeholder="Full Address" required="">
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <label for="city">Town/City</label>
                     <input type="text" id="city" class="form-control" name="city" placeholder="Town/City">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="pincode">Pincode</label>
                     <input type="text" id="pincode" class="form-control" name="pincode" placeholder="6 digits [0-9] Pin code" required="">
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <h4 class="d-flex justify-content-between align-items-center">
               <span>Order Summary</span>
               <span class="badge badge-secondary badge-pill"><?php echo $count; ?></span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
               <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div class="product-list">
                     <img src="images/<?php echo $row['image']?>" style="width:100px; height: 100px;">
                     <h6><?php echo $row['product_name']?></h6>
                     <small class="text-muted"><?php echo $row['description']?></small>
                  </div>
                  <span class="text-muted">$<?php echo $row['price']?></span>
               </li>
               <li class="list-group-item d-flex justify-content-between">
                  <strong> Order Total: </strong>
                  <strong>$<?php echo $row['price']?></strong>
                  <input type="hidden" name="amount" value="<?php echo $row['price']?>" />
                  <input type="hidden" id="product_summary" name="product_summary" value="<?php echo $row['product_name']?>" />
               </li>
            </ul>
            <div class="form-group">
               <button type="submit" class="btn btn-success" name="check_out_btn" style="display: none;">Checkout</button>
               <div id="paypal-button-container" class="mt-3"></div>
            </div>
         </div>
      </div>
   </form>
</div>
</body>
</html>

<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"></script>
                    
<script>
   paypal.Buttons({
      onClick(){
         $('.text-danger').remove();
         var counter = 0;
         if ($("#name").val() == "") {
            $("#name").after('<span class="text-danger">Name is required</span>');
            counter++;
         }
         if ($("#phone").val() == "") {
            $("#phone").after('<span class="text-danger">Phone is required</span>');
            counter++;
         }
         if ($("#email").val() == "") {
            $("#email").after('<span class="text-danger">Email is required</span>');
            counter++;
         }
         if ($("#address").val() == "") {
            $("#address").after('<span class="text-danger">Address is required</span>');
            counter++;
         }
         if ($("#pincode").val() == "") {
            $("#pincode").after('<span class="text-danger">Pincode is required</span>');
            counter++;
         }
         if ($("#city").val() == "") {
            $("#city").after('<span class="text-danger">City is required</span>');
            counter++;
         }

         if (counter > 0) {
            return false;
         }else{
            return true;
         }
      },

      createOrder: (data, actions)=> {
         return actions.order.create({
            purchase_units:[{
               amount:{
                  value: "<?php echo $row['price']?>",
                  currency_code: 'USD'
               }
            }]
         });
      },
      onApprove: (data, actions)=> {
         return actions.order.capture().then(function(orderData){
            const transaction = orderData.purchase_units[0].payments.captures[0];
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var address = $("#address").val();
            var city = $("#city").val();
            var pincode = $("#pincode").val();
            var productSummary = $("#product_summary").val();

            var formData = {
               'name' : name,
               'email' : email,
               'phone': phone,
               'address' : address,
               'city' : city,
               'pincode' : pincode,
               'product_summary' : productSummary,
               'transaction_id' : transaction.id,
               'payment_status' : transaction.status,
               'check_out_btn' : true,
               'amount' : transaction.amount.value,
               'currency_code' : transaction.amount.currency_code,
               'create_time' : transaction.create_time
            };

            $.ajax({
               method: "POST",
               url: "pay.php",
               data: formData,
               success:function(response){
                  if (response=="success") {
                     window.location.href = "success.php?txnsId=" + transaction.id;
                  }else{
                     window.location.href="cancel.php";
                  }
               }
            });
         });
      }
   }).render('#paypal-button-container');
//This function displays payment buttons on your web page.
</script>