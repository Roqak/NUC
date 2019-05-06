<?php
$host = "localhost";
$username = "phpmyadmin";
$password = "akinkunmi";
$db = "nuc";
$conn = mysqli_connect($host,$username,$password,$db);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
if(!$conn){
    echo "Error connecting to the database";
}
if(isset($_POST['submit'])){
    if (!function_exists('generate_txn_ref'))
    {
        function generate_txn_ref() {
            global $gen_txn_ref;
            $random_chars = "";


            $characters = array(
                "A","B","C","D","E","F","G","H","J","K","L","M",
                "N","P","Q","R","S","T","U","V","W","X","Y","Z",
                "1","2","3","4","5","6","7","8","9");

            $keys = array();

            while(count($keys) < 12) {//10 xters
                $x = mt_rand(0, count($characters)-1);
                if(!in_array($x, $keys)) {
                    $keys[] = $x;
                }
            }

            foreach($keys as $key){
                $random_chars .= $characters[$key];
            }

            $gen_txn_ref = "NUC".$random_chars;
            return $gen_txn_ref;

        }
    }
    $random_token = generate_txn_ref();
    $university_name = 'University of Ibadan';
$new_token = "INSERT INTO `token`(`university`,`code`) VALUES ('$_POST[university_name]','$random_token')";
$query = mysqli_query($conn,$new_token);
if ($query){
    $mail_address = $_POST['email'];
   try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = '';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = 'secret';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('', 'Mailer');
    $mail->addAddress('');               // Name is optional
    $mail->addReplyTo('', 'Information');


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'NUC Update Token';
    $mail->Body    = 'Your token is '.$random_token;

    $mail->send();
   $message = "Token Generated<br> Email sent";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
}

?>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>NUC</title>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext'>

      <link rel="stylesheet" href="css/main.css">

  
</head>

<body>
  <div class="materialContainer">


   <div class="box">

      <div class="title">Generate Token</div>
<form action="request_token.php" method="post">
      <div class="input">
      <p class="text txt-success"><?php if(isset($message)){echo $message;};?></p>
         <label for="university_name">University Name</label>
         <input type="text" name="university_name" id="university_name">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="pass">Email</label>
         <input type="email" name="email" id="pass">
         <span class="spin"></span>
      </div>

      <div class="button login">
         <button type="submit" name="submit"><span>GO</span> <i class="fa fa-check"></i></button>
      </div>

</form>
   </div>

   

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/main.js"></script>

</body>
</html>
