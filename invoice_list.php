<?php 
session_start();
include('header.php');
include 'Invoice.php'; 
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<title>Invoice System</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
	
	<div id="mySidenav" class="sidenav">
	<p class="logo"><img src="logo.png"><span>S</span>RM</p>
  <a href="homepage.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="invoice_list.php"class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Invoice</a>
  <a href="history.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;History</a>
  <a href="req.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Requisition Form</a>

</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Invoice</span>
<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >&#9776; Supplier Relationship Management</span>
</div>
	
	<div class="col-div-6">
	<div class="profile" onclick="menuToggle();">
		<img src="user.png" class="pro-img" />
		<p><?=$_SESSION['user']?><span>Admin</span></p>
      <div class="menu">
          <ul>
              <li><img src="profile.png"><a href="#"> My profile </a></li>
              <li><img src="logout.png"><a href="action.php?action=logout">Logout</a></li>
          </ul>
      </div>
	</div>
</div>
      <script>
          function menuToggle() {
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active')
          }
      </script>
	<div class="clearfix"></div>
</div>

<?php include('container.php');?>
	<div class="container">		
	  <h2 class="title mt-5">Invoice</h2>
	  <?php include('menu.php');?>			  
      <table id="data-table" class="table table-condensed table-hover table-striped">
        <thead>
          <tr>
            <th>Invoice No.</th>
            <th>Customer Name</th>
            <th>Create Date</th>
            <th>Total</th>
            <th>Print</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <?php		
	    	$invoiceList = $invoice->getInvoiceList();
        foreach($invoiceList as $invoiceDetails){
			  $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
        ?>
              <tr>
                <td><?php echo $invoiceDetails["order_id"];?></td>
                <td><?php echo $invoiceDetails["order_receiver_name"];?></td>
                <td><?php echo $invoiceDate;?></td>
                <td><?php echo $invoiceDetails["order_total_after_tax"];?></td>
                <td><a href="print_invoice.php?invoice_id=<?php echo $invoiceDetails["order_id"];?>" title="Print Invoice"><button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button></a></td>
                <td><a href="edit_invoice.php?update_id=<?php echo $invoiceDetails["order_id"];?>"  title="Edit Invoice"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a></td>
                <td><a href="delete-invoice.php?order_id=<?php echo $invoiceDetails['order_id'];?>" title="Delete Invoice"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a></td>
              </tr>
        <?php }       
        ?>
      </table>	
</div>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  $(".nav").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('visibility', 'hidden');
    $(".sidenav img").css('visibility','visible');
    $(".sidenav img").css('width','35px');
    $(".sidenav img").css('margin-left','-7px');
    $(".sidenav img").css('margin-top','10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".nav").css('display','none');
      $(".nav2").css('display','block');
     
  });

$(".nav2").click(function(){
    $("#mySidenav").css('width','300px');
    $("#main").css('margin-left','300px');
    $(".logo").css('visibility', 'visible');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".nav").css('display','block');
     $(".nav2").css('display','none');
      $(".sidenav img").css('width','60px');
      $(".sidenav img").css('margin-right','10px'); 
      $(".sidenav img").css('margin-top','-7px'); 
 });

</script>
</body>

