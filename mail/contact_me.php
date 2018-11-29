<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = 'saamisemail@domeen.eest';
$email_subject = "Veebilehe kontakt:  $name";
$email_body = "See sõnum tuli veebilehelt.\n\n"."Kontakteeruja andmed:\nNimi: $name\nEmail: $email_address\nTelefon: $phone\n\nSõnum:\n$message";
$headers = "From: noreply@domeen.ee\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
