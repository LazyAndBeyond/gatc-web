<?php 

$name_error = $email_error =  "";
$name = $email = $message = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format"; 
    }
  }
  
    if (empty($_POST["subject"])) {
    $subject_error = "Subject is required";
  } else {
    $subject = test_input($_POST["subject"]);
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
  
  $to = "ayoub.kermout@gmail.com"
  $about = "GA:TC CONTACT RECIVED!!"
  $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message"
  
  mail($to, $about, $body, "From: $name <$email>")
  $success = "Message sent, thank you for contacting us!";
  $name = $email = $message = '';
  
}
}
?>