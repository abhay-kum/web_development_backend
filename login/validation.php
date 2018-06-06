
<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<?php
	// variable declaration
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="articlegure";
	#$tablename="article";

     	$db=mysqli_connect($servername,$username,$password,$dbname);
	

	 if($_GET['q'])
	{
             $userid=$_GET['q'];
             $query = "SELECT * FROM login WHERE userid='$userid' ";
	     $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1)
		 {
		echo"<i class='fas fa-times'></i> sorry!! username not available ";				
		 }
	
	    else {
		echo"<i class='fas fa-check'></i>username available";
		}
          }

        ####this for email verification of userid
       if($_GET['userid'])
	{
          $userid=$_GET['userid'];
	  $query="UPDATE registration SET email_id_status='yes' WHERE id='".$userid."'";
	if (mysqli_query($db, $query)) 
         {
             echo "Record updated successfully";
          }      
        else {
           echo "Error updating record: " . mysqli_error($conn);
             }

	}
	
mysqli_close($db);
	
?>
</html>
