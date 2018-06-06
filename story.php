<?php
include('login/server.php')
?>

<html>
<head><title>Article:create your own story</title></head>
<header>
	<?php
if(!$_SESSION['username'])
{
echo" <p class='login'> <a href='http://localhost/articlegure_new_website/login/login.php'><button > Login</button></a>";
echo"<a href='http://localhost/articlegure_new_website/login/register.php'><button>Register</button> </a></p>";

}

?>

</header>

<body>
<div id="header">
<?php #echo $_SESSION['success'];
if($_SESSION['username'])
{
 echo "Welcome " .$_SESSION['username'];
 $value="1";
 echo" <a href='login/logout.php/?logout=".$value."' style='color: red;'><button>Logout</button></a> </p>";

}
?>
<a href="http://localhost/articlegure_new_website/index2.php"><button>Home</button></a>
</div>

	<?php
	$id=$_GET['id'];
	#echo($id);
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="articlegure";
	$tablename="article";

     	$conn=mysqli_connect($servername,$username,$password,$dbname);
	$sql="SELECT* from article where article_id='".$id."'";
	$result=mysqli_query($conn,$sql);	
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result))
   	{ 
      	echo"<div class='card'>";
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width=300px />';
        echo"<h1>".$row['title']."</h1>";
	echo"<div style='margin: 24px 0;'><p>".$row['story']."</p></div>";
echo"</div>";
          
	  #echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
	  
      }}
mysqli_close($conn);


	?>

</body>
</html>
