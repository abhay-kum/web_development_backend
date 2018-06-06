 <?php include('login/server.php') ?>




<html>

<head><title>ArticleGure:Create Your own story</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<header>
<?php
if(!$_SESSION['username'])
{
echo" <p class='login'> <a href='login/login.php'><button > Login</button>";
echo"<a href='login/register.php'><button>Register</button> </p>";

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
</div>
<div id="article_content">
   <?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="articlegure";
	$tablename="article";

     	$conn=mysqli_connect($servername,$username,$password,$dbname);
	$sql="SELECT article_id,title,short_description,image,status,published from article";
	$result=mysqli_query($conn,$sql);	
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result))
   	{ 
      	echo"<div class='card'>";
      	if($row['published']=="yes")
      	{


	echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width=300px />';
        echo"<h1>".$row['title']."</h1>";
	echo"<p class='title'>".$row['title']."</p><div style='margin: 24px 0;'><p>".$row['short_description']."</p></div>";

	if ($row['status']=="not" )
	{
         
       echo"<p><a href='story.php/?id=".$row['article_id']."'><button>Read More</button></p></a></div>";

		}

	else{
          if($_SESSION['username'])
          {
          	echo"<p><a href='story.php/?id=".$row['article_id']."'><button>Contact</button></p></a></div>";
          }
          else{
               echo"<p><button id='login_btn'>Read More</button></p></div>";  	
          }
		
	}
#echo"<p><button value='".$row['article_id']"' onclick=''>Contact</button></p></div>";
#echo"<button onclick='document.getElementById('id01').style.display='block'' style='width:auto;'>Login</button>";

#echo"<p><a href='story.php/?id=".$row['article_id']."'><button value='".$row['article_id']"'>Contact</button></p></a></div>";
          
	  #echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
	  
      }}}
      
mysqli_close($conn);
?>
</div>

<!---------------------The login model ------------>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p style="text-align: center;">For read this story you have to login first </p>
    <a href="login/login.php">
    <button style="width: 400px; text-align: center; margin-left: 350px;">Login</button></a>
  </div>

</div>


</body>
<!--java script-->

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("login_btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


</html>

