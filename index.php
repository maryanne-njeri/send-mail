<?php 

require_once './vendor/autoload.php';
require_once './credentials.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Create the Transport
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
    ->setUsername(EMAIL)
    ->setPassword(PASS)
  ;

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

  // Create a message
  $message = (new Swift_Message('Wonderful Subject'))
    ->setFrom([EMAIL => SENDER_NAME])
    ->setTo([$_POST['email'] => $_POST['name']])
    ->setBody('Here is the message itself')
    ;

  // Send the message
  $result = $mailer->send($message);

  if ($result) {
    
    echo 'Successful';
  } else {
    echo 'Failed to send';
  }

}

?>

<div style="display: flex">
  <form action="" method="POST">
    <input type="text" name="name" placeholder="Enter receiver's name"> <br> <br>
    <input type="text" name="email" placeholder="Enter receiver's email"> <br> <br>
    <button type="submit">Send Email</button>
  </form>
</div>