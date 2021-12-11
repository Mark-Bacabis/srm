<?php
  session_start();
?>
<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="styles1.css" type="text/css"/>
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
<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Requisition Form</span>
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

<div class="a">
<div class="container">		
	  <div class="title"> Requisition Form </div>
          <form action="#">
              <div class="user-details">
                <div class="input-box">
                    <span class="details"> Full name </span>
                    <input type="text" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone number</span>
                    <input type="text" placeholder="Enter your phone number" required>
                </div>  
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" placeholder="Enter your Address" required>
                </div>  
         </div>
        <div class="button">
            <input type="submit" value="submit">
        </div>
  </form>
</div>
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
