<?php
$name = $_POST['name'];
$request = $_POST['request'];
$to = "kenicek56@gmail.com";
$subject = "New Message";
$body = "dont reply. \n\n $request";

mail ($to, $subject, $body);
echo "your message has been sent";

?>