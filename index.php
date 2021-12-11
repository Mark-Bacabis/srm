<?php 
session_start();
include('header.php');
include('dbcon.php');
$loginError = "";

if(isset($_POST['loginBtn'])){
  $email = $_POST['email'];
  $pass =  $_POST['pwd'];
  

  $selAdmin = mysqli_query($con, "SELECT * FROM `invoice_user` WHERE `email` = '$email' AND `password` = '$pass' ");

  if(mysqli_num_rows($selAdmin) === 1){
    $admin = mysqli_fetch_assoc($selAdmin);
    $_SESSION['aid'] = $admin['id'];
    $_SESSION['user'] = $admin['first_name']." ".$admin['last_name'];
    $_SESSION['address'] = $admin['address'];
    $_SESSION['mobile'] = $admin['mobile'];
    $_SESSION['email'] = $admin['email'];
    header('location:homepage.php');
  }else{
    $loginError = "Invalid email or password!";
  }

}




?>
<title>Supplier Relationship Management System</title>

<style type="text/css">
	*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }
  body{
    margin: 0;
    padding: 0;
    background: linear-gradient(120deg,#2980b9, #8e44ad);
    height: 100vh;
    overflow: hidden;
  }
  .center{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 400px;
    background: white;
    border-radius: 10px;
    box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
  }
  .center h1{
    text-align: center;
    padding: 20px 0;
    border-bottom: 1px solid silver;
  }
  .center form{
    padding: 0 40px;
    box-sizing: border-box;
  }
  form .txt_field{
    position: relative;
    border-bottom: 2px solid #adadad;
    margin: 30px 0;
  }
  .txt_field input{
    width: 100%;
    padding: 0 5px;
    height: 40px;
    font-size: 16px;
    border: none;
    background: none;
    outline: none;
  }
  .txt_field label{
    position: absolute;
    top: 50%;
    left: 5px;
    color: #adadad;
    transform: translateY(-50%);
    font-size: 16px;
    pointer-events: none;
    transition: .5s;
  }
  .txt_field span::before{
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 0%;
    height: 2px;
    background: #2691d9;
    transition: .5s;
  }
  .txt_field input:focus ~ label,
  .txt_field input:valid ~ label{
    top: -5px;
    color: #2691d9;
  }
  .txt_field input:focus ~ span::before,
  .txt_field input:valid ~ span::before{
    width: 100%;
  }
  .pass{
    margin: -5px 0 20px 5px;
    color: #a6a6a6;
    cursor: pointer;
  }
  .pass:hover{
    text-decoration: underline;
  }
  input[type="submit"]{
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;
  }
  input[type="submit"]:hover{
    border-color: #2691d9;
    transition: .5s;
  }
  .footer{
    margin: 50px 0;
  }
</style>


<div class="center">
      <h1>Login</h1>
      <form method="post">
	  <?php if ($loginError ) { ?>
				<div class="alert alert-warning"><?php echo $loginError; ?></div>
		<?php } ?>
        <div class="txt_field">
          <input type="text" name="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name= "pwd" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" name="loginBtn" value="Login">
        <div class="footer">
        </div>
      </form>
    </div>



