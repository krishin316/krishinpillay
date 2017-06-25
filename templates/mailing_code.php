<?php 
if(isset($_POST['submit'])){
    $to = "krishin316@gmail.com"; // this is your Email address
    $from = $_POST['krishin316@gmail']; // this is the sender's Email address
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = "Message on website from " . $name;
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    
    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);

    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}
?>