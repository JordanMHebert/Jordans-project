<?php

$name=$email=$phone=$message="";
$email_from=$email_subject=$email_body=$headers=$to="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $name = validateinput($_POST["name"]);
  $email = validateinput($_POST["email"]);
  $phone = validateinput($_POST["phone"]);
  $message = validateinput($_POST["message"]);

  $email_from = "jordanmhebert.com";
  $email_subject = "New Message from jordanmhebert.com Contact Form";
  $email_body = "Name: $name.\n".
                "Email: $email.\n".
                "Phone: $phone.\n".
                "Message: $message.\n";

  $to ="jordan@jordanmhebert.com";
  $headers = "From: $email_from \r\n";
  $headers = "Reply-To: $email \r\n";

  mail($to,$email_subject,$email_body,$headers);

  header("location: formsuccess.html");
}

  function validateinput($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }
 ?>
