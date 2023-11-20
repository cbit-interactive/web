<?php

// PHP email
$errors = '';
$myemail = 'general.cbit@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['comment']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['comment'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if (empty($errors)){
    if($_POST["submit"]){
        $to = $myemail;
        $subject = "CBit contact form: $name";
        $email_body = "You have received a message!\n\nDetails:\nName: $name \nEmail: $email_address \nMessage: $message";
        mail($to, $subject, $email_body);
        sleep(1);
        header("Location:www.cbit-interactive.github.io/web/index.html");
    }
    
}
?>