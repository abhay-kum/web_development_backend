<?php
include('server.php');
if($_GET['logout'])
{
  #session_destroy();
  $_SESSION['username']="";
  #unset($_SESSION['username']);
  header('location: http://localhost/articlegure_new_website/index2.php');


}


?>
