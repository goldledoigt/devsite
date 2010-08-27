<?php

header('Content-Type:text/plain');


$Name = "Da Duder";
$email = "gary@chewam.com";
$recipient = "PersonWhoGetsIt@emailadress.com";
$mail_body = "The text for the mail...";
$subject = "Subject for reviever";
$header = "From: ". $Name . " <" . $email . ">\r\n";

mail($recipient, $subject, $mail_body, $header);


print '{success:true}';

?>