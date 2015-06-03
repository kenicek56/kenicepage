<?php
if(isset($_POST['email'])) {
    // here is the email to information
    $email_to ="kenicek56@gmail.com";
    $email_subject = "this is from your website contact form";
    $email_from = "J Design In Motion";

    //error code
    function died($error) {
        echo "We are sorry, but there were error(s) found when submitted.";
        echo "these errors appear below.<br/><br/>";
        echo $error. "<br/><br/>";
        echo "please go back and fix these errors.<br/>";
        die();
}
// validation
        if(!isset($_POST ['name']) ||
        !isset($_POST['email']) || 
        !isset($_POST['comments'])) {
            died('we are sorry but there seems to be a problem with the form you submitted.');
        } 
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
if(!preg_match($email_exp, $email)) {
    $error_message .='The email address you entered does not exist.<br/>';
}       
 $string_exp = "/^[A-Za-z.'-]+$/";
 if(!preg_match($string_exp, $name)) {
    $error_message .= 'The name you entered is not vaild<br/>';
 }  

 if(strlen($comments) < 2){
    $error_message .= 'The comments you entered is not valid<br/>';
 }  

 if(strlen($error_message) > 0){
    died($error_message);
 }  
$email_message = "Form details below.\n\n";

function clean_string($string) {
    $bad =array("content-type", "bcc:", "to:", "cc:", "href");
    return str_replace($bad, "", $string);
}
$email_message .="Name:" . clean_string($name) . "\n";
$email_message .="Email:" . clean_string($email) . "\n";
$email_message .="Comments:" . clean_string($comments) . "\n";

// create email headers
$headers = 'From: ' .$email_from . "\r\n". 'Reply-To:' .
$email. "\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

?>

<!--- success message goes here-->
thank you for contacting me i will be in touch with you shortly.<br/>
please click<a href="index.html"> here </a> to go back to the form.

<?php

}
?>