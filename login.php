<?php

session_start();

include("connection.php");
include("function.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		//read from database
		$query = "select * from users where user_name = '$user_name' limit 1";
		$result = mysqli_query($con, $query);

		if ($result) {
			if ($result && mysqli_num_rows($result) > 0) {

				$user_data = mysqli_fetch_assoc($result);

				if ($user_data['password'] === $password) {

					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location: index.php");
					die;
				}
			}
		}

		echo "<center><b>wrong username or password!</b></center>";
	} else {
		echo "<center><b>wrong username or password!</b></center>";
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<?php echo '<link href="style1.css" rel="stylesheet">'; ?>
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
        .box{
            color:black;
            font-size: 20px;
            font-weight: 5000000px;
            border-radius:20px;
            padding:rem;
            padding-left:750px;
            padding-right:600px;
            font-family:'pacifico', cursive;
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
            padding-left:0px;
            padding-top:0px;
            font-variant:normal;
        }
	</style>
     <h1 class="animate__animated animate__heartBeat animate_infinite"><b>OLP </b><i><q>Online Learning Platform </q></i></h1>
</head>

<body>

	<div id="box">

		<form method="post">
			<div>
				<h1>Login</h1>
			</div>

			<div class="box">
				<label for="user_name" class="fl fontLabel">
					<h5>User Name:</h5>
				</label>
				<div class="new iconBox">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
				<div class="fr">
					<input type="text" name="user_name" placeholder="User Name" class="textBox" autofocus="on" required>
				</div>
				<div class="clr"></div>
			</div>
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
			<div class="box">
				<input type="Submit" name="Submit" class="submit" value="SUBMIT">
			</div>
			<br>
			<h4>Still Not Registered? <a href="register.php">Sign Up Here</a>
			</h4>
		</form>
	</div>
</body>

</html>