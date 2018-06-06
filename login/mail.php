<?php

    error_reporting(0);

    $name=$_POST['name'];
    $age=$_POST['age'];
    $phn=$_POST['phnno'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $symptom1=$_POST['symptom1'];
    $symptom2=$_POST['symptom2'];
    $symptom3=$_POST['symptom3'];
    $symptom4=$_POST['symptom4'];
    $symptom5=$_POST['symptom5'];




    $body = 'Name: '.$name.PHP_EOL;
    $body .= 'Email: '.$email.PHP_EOL;
    $body .= 'Age: '.$age.PHP_EOL;
    $body .= 'Phone No: '.$phn.PHP_EOL;
    $body .= 'Gender: '.$gender.PHP_EOL;
    $body .= 'Symptoms: '.$symptom1.' ,'.$symptom2.' ,'.$symptom3.' ,'.$symptom4.' ,'.$symptom5.PHP_EOL;

   


    $uid = md5(uniqid(time()));

  $replyto = $from_mail = 'cmishra646@gmail.com';
  // header
  $header = "From: "."MedLife"." <".$from_mail.">\r\n";
  $header .= "Reply-To: ".$replyto."\r\n";
  $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
  // message & attachment/*
  $nmessage = "--".$uid."\r\n";
  $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
  $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
  $nmessage .= $body."\r\n\r\n";
  $nmessage .= "--".$uid."\r\n";
  //$nmessage .= "Content-Type: application/octet-stream; name=\"".$name."\"\r\n";
  //$nmessage .= "Content-Transfer-Encoding: base64\r\n";
  //$nmessage .= "Content-Disposition: attachment; filename=\"".$name."\"\r\n\r\n";
  //$nmessage .= $content."\r\n\r\n";
  //$nmessage .= "--".$uid."--";


  $subject = 'Your Medical Ticket';
  mail($email, $subject, $nmessage, $header);
  
  header("Location: https://serve360.000webhostapp.com/Trial/success.php"); /* Redirect browser */
  exit();
  ?>
