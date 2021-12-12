<?php
   include('../dbcon.php');
   
   $rand = substr(str_shuffle('1234567890'), 0, 12);
   $transID = 'SRM-'.$rand;
   $dateNow = date('Y-m-d');

   if(isset($_POST['invoice_btn'])){
      // USER 
      $uid = $_POST['userId'];

      // RECIEVER
      $compName = $_POST['companyName'];
      $comAdd = $_POST['address'];

      // ARRAY VARIABLE
      $prCode = $_POST['productCode'];
      $prName = $_POST['productName'];
      $qty = $_POST['quantity'];
      $price = $_POST['price'];
      $total = $_POST['total'];

     
      $notes = $_POST['notes'];
      $amtDue = $_POST['amountDue'];
      $amtPaid = $_POST['amountPaid'];
      $totalATax = $_POST['totalAftertax'];
      $taxAmt = $_POST['taxAmount'];
      $taxRate = $_POST['taxRate'];
      $subTotal = $_POST['subTotal'];


      foreach($prCode as $i => $code){
         //echo "$uid $dateNow $compName $comAdd ";
         //echo "$transID $code ".$prName[$i]." ".$qty[$i]." ".$price[$i]." ".$total[$i]."<br>";
         //echo strlen($transID);

         //Code here...
         $Items = "INSERT INTO `invoice_order_item`
         (`order_id`, `item_code`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_final_amount`) VALUES ('$transID','$code','".$prName[$i]."','".$qty[$i]."','".$price[$i]."','".$total[$i]."')" ;

         $insItem = mysqli_query($con, $Items);
      }

        // Code here...
      $ins = "INSERT INTO `invoice_order`(`user_id`, `order_id`, `order_receiver_name`, `order_receiver_address`, `order_total_before_tax`, `order_total_tax`, `order_tax_per`, `order_total_after_tax`, `order_amount_paid`, `order_total_amount_due`, `order_date`, `note`) 
      VALUES 
      ('$uid','$transID','$compName','$comAdd','$subTotal','$taxAmt','$taxRate','$totalATax','$amtPaid','$amtDue',' $dateNow',' $notes')";

      $insertOrder = mysqli_query($con, $ins);

      if(!$insertOrder){
         error_log($con);
      } 
      else{
         header('location: ../create_invoice.php?Inserted Successfuly');
      }


   }
?>