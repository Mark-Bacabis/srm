<?php
  session_start();
?>
<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


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
<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; History</span>
<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >&#9776; Supplier Relationship Management</span>
</div>
	
	<div class="col-div-6">
	<div class="profile" onclick="menuToggle();">
		<img src="user.png" class="pro-img" />
		<p><?=$_SESSION['user']?><span>Admin</span></p>
      <div class="menu">
          <ul>
              <li><img src="profile.png"><a href="#">My profile</a></li>
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

<div class="container">		
	  <h2 style="color: white">History</h2>		  
      <table id="data-table" class="table table-condensed table-hover table-striped">
     
        <thead>
          <tr>
            <th>Transcation No.</th>
            <th>Date</th>
            <th>View Details</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
              <tr>
                <td>724314s14231197</td>
                <td>2021-04-12</td>
                <td><a href="edit_invoice.php?update_id='.$invoiceDetails["order_id"].'"  title="Edit Invoice"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a></td>
                <td><a href="delete-invoice.php?order_id='.$invoiceDetails['order_id'].'" title="Delete Invoice"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a></td>
              </tr>
         </tbody>
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


</html>
