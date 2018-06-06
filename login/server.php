

<?php 
	session_start();

	// variable declaration
		$servername="localhost";
	$username="root";
	$password="";
	$dbname="articlegure";
	#$tablename="article";

     	$db=mysqli_connect($servername,$username,$password,$dbname);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "not login";
    
	// connect to database
	#$db = mysqli_connect('localhost', 'root', '', 'articlegure');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO registration (userid,email_id,password) 
					  VALUES('$username','$email','$password')";
			$query1 = "INSERT INTO login (userid,email_id,password) 
					  VALUES('$username','$email','$password')";

			$result=mysqli_query($db, $query);
			mysqli_query($db,$query1);
           
           if($result)
###check userid registred or not
             {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "logged in";
			header('location: http://localhost/articlegure_new_website/index2.php');
		}
	}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM login WHERE userid='$username' AND password='$password'";

			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "logged in";
		header('location: http://localhost/articlegure_new_website/index2.php');	}
			else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}


?>
