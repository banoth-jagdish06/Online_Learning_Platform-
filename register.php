<?php
session_start();

include("connection.php");
include("function.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		//save to database
		$user_id = random_num(20);
		$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

		mysqli_query($con, $query);

		header("Location: login.php");
		die;
	} else {
		echo "Please enter some valid information!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>register page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,100&display=swap" rel="stylesheet">
    <script src='main.js'></script>
    <style>
        body{
            padding-left: 100px;
            padding-top:80px;
            padding-right:50px;
            padding-bottom:0px;
            background-image:url("01.png");
            background-size: cover;
            background-position:25px;
            background-color: white;
        }
        form{
            color:black;
            font-size: 20px;
            font-weight: 5000000px;
            border-radius:20px;
            padding:1rem;
            padding-left:750px;
            padding-right:600px;
            font-family:'pacifico', cursive;
            border-spacing:2rem;
            
          }
        h1{
            text-align: center;
            padding-left:5px;
            padding-top: 8px;
            font-weight: 700px;
            padding-top:100px;
            font-size:4rem;
            font-family: 'pacifico', cursive;
        }
        h4{
            text-align: center;
        }
    </style>
    <h1 class="animate__animated animate__heartBeat animate_infinite"><b>OLP </b><i><q>Online Learning Platform </q></i></h1>
</head>
<body>
<div id="box">

<form method="post">
  <div>
    <h1>Signup</h1>
  </div>

  <div class="box">
    <label for="user_name" class="fl fontLabel">
      <h5>User Name:</h5>
    </label>
    <div class="new iconBox">
      <i class="fa fa-user" aria-hidden="true"></i>
    </div>
    <div class="fr">
      <input type="text" name="user_name"  placeholder="User Name" class="textBox" autofocus="on" required>
    </div>
    <div class="clr"></div>
  </div>
  <br>
  <!---Phone No.------>
  <div class="box">
    <label for="phone" class="fl fontLabel">
      <h5> Phone No.: </h5>
    </label>
    <div class="fl iconBox"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
    <div class="fr">
      <input type="text" required name="phone_no" maxlength="10" placeholder="Phone No." class="textBox">
    </div>
    <div class="clr"></div>
  </div>
  <!---Phone No.---->
  <br>
  <!---Email ID---->
  <div class="box">
    <label for="email" class="fl fontLabel">
      <h5>Email ID:</h5>
    </label>
    <div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    <div class="fr">
      <input type="email" required name="email" placeholder="Email Id" class="textBox">
    </div>
    <div class="clr"></div>
  </div>
  <!--Email ID----->
  <br>
  <div class="box">
    <label for="password" class="fl fontLabel">
      <h5>Password:</h5>
    </label>
    <div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    <div class="fr">
      <input type="Password" required name="password" placeholder="Password" class="textBox">
    </div>
    <div class="clr"></div>
  </div>
  <br>
  <!--Terms and Conditions------>
  <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">I accept the terms and conditions</label>
  </div>
  <!--Terms and Conditions------>
  <div class="box">
    <input type="Submit" name="Submit" class="submit" value="SUBMIT">
  </div>
  <h4>Already Registered? <a href="login.php">Login Here</a>
  </h4>


</form>
</body>
</html>