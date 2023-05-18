<?php
$to_email = "achumr1501@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
//$headers = "From: myallinoneproject@gmail.com" . "\r\n";
if (mail($to_email, $subject, $body)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>