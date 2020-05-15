<?php

// Check for empty fields
if(empty($_POST['name'])      || empty($_POST['email'])     ||   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
    echo "Name or mail missing";
    return false;
}

    $secret='1234567890abcdefhijklmnopqrstuvwxyz1234567890';

    $capI = $_POST['capInput'];

    $a = $_POST['capA'];
    $b = $_POST['capB'];
    $c = $_POST['capC'];
    $d = $_POST['capD'];

    $cA = substr($secret, $a, 1);
    $cB = substr($secret, $b, 1);
    $cC = substr($secret, $c, 1);
    $cD = substr($secret, $d, 1);  
    
    $text = $cA.$cB.$cC.$cD;

    if($capI != $text)
     {
        echo "Captcha wrong";
        return false;
     }

function getUserIpAddr(){
   if(!empty($_SERVER['HTTP_CLIENT_IP'])){
       //ip from share internet
       $ip = $_SERVER['HTTP_CLIENT_IP'];
   }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
       //ip pass from proxy
       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
   }else{
       $ip = $_SERVER['REMOTE_ADDR'];
   }
   return $ip;
}

$ip = getUserIpAddr();
$info = $_SERVER['HTTP_USER_AGENT'];
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$email_subject = "Website Contact Form:  $name";

$email_body = "<html><body>";
$email_body .= "<h3>Website Contact Form: </h3>\n\n";
$email_body .= "<b>Name:</b>  $name <br><b>Email:</b> $email_address <br><b>Phone:</b> $phone <br><br>";
$email_body .= "<b>Message:</b><br>$message <br><br><b>Ip:</b> $ip <br><b>Info:</b> $info";
$email_body .= "</body></html>";

$headers = "From: noreply@yourdomain.com\n"; // Sender of the E-Mail address - change to your URL
$headers .= "Reply-To: $email_address";   
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";

mail("my.email@myhost.url",$email_subject,$email_body,$headers); // recipient!! Send E-Mail to this address

echo "true"; 
return true;      
?>
