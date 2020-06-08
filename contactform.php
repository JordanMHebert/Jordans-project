<?php

$name=$email=$phone=$message=$success=$failure='';
$email_from=$email_subject=$email_body=$headers=$to='';

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $name = validateinput($_POST["name"]);
  $email = validateinput($_POST["email"]);
  $phone = validateinput($_POST["phone"]);
  $message = validateinput($_POST["message"]);


foreach ($_POST as $key => $value) {
  $email_body.= "$key: $value.\n";
}

  $email_from = "jordanmhebert.com";
  $email_subject = "New Message from jordanmhebert.com Contact Form";


  $to ="jordan@jordanmhebert.com";
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $email \r\n";

  if(mail($to,$email_subject,$email_body,$headers)){
    $success="Your submission was Successful";
    $name=$email=$phone=$message='';
    // echo "<script type="text/javascript"> document.getelementbyId("successID").style.visibility = "visible";</script>"
  } else {
    $failure="Sorry, your submission did not go through. Please try again.";
    $name=$email=$phone=$message='';
  }
readfile("contact.html");
}

  function validateinput($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }



 ?>
