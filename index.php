<?php

  require_once 'vendor/autoload.php';
  require_once 'credentials.php';
  // D:\Code\hunterinitiative\2021\Inprogress\mail\vendor

  // create email
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
    ->setUsername('EMAIL')
    ->setPassword('PASS');

  // creating Mailer
  $mailer = new Swift_Mailer($transport);

  // create a message
  $message = (new Swift_Message('Greetings'))
  ->setFrom([EMAIL => 'Sender Name'])
  ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
  ->setBody('My Message');

  // send message
  $result = $mailer -> send($message);

  if ($result) {
    
    return 'successfull';
  } else {
    
    return 'Oops Something Went Wrong!!!';
  }
  

?>