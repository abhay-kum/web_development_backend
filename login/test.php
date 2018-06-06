<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div class="header">
		<h2>Submit Your Details Here</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>

			<form method="post" action="mail.php">


				<div class="input-group">
				    <input type="text" name="name" placeholder="Your Name" >
				</div>
				<div class="input-group">
				    <input type="number" name="age" placeholder="Age">
				</div>
				<div class="input-group">
					<input type="number" name="phnno" placeholder="Phone Number">
				</div>
				<div class="input-group">
					<input type="email" name="email" placeholder="Your Email">
				</div>
				<div class="input-group">
					<label>Gender:</label>
					<select name="gender">
  					<option value="male">Male</option>
  					<option value="female">Female</option>
  					<option value="other">Other</option>
					</select>
				</div>
				<div class="input-group">
					<input type="text" name="symptom1" placeholder="symptom1">
				</div>
				<div class="input-group">
					<input type="text" name="symptom2" placeholder="symptom2">
				</div>
				<div class="input-group">
				    <input type="text" name="symptom3" placeholder="symptom3">
				</div>
				<div class="input-group">
				    <input type="text" name="symptom4" placeholder="symptom4">
				</div>
				<div class="input-group">
				    <input type="text" name="symptom5" placeholder="symptom5">
				</div>
				<div class="input-group">
					<button type="submit" class="btn" name="login_user">Submit</button>
				</div>
				
			</form>

		<?php endif ?>
	</div>

</body>
</html>
