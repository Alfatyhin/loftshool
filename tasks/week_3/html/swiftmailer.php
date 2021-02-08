<?php
require_once '../vendor/autoload.php';
// mail pssword
require_once('../../../../mailpass.php');

try {

//// Create the Transport
//    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
//        ->setUsername('virikidorhom@gmail.com')
//        ->setPassword(PROGECT_MAIL_PASS)
//        ->setStreamOptions(array('ssl' => array(
//            'allow_self_signed' => true, 'verify_peer' => false)));
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('tangocalendar.ua@gmail.com')
        ->setPassword(PROGECT_MAIL_PASS)
        ->setStreamOptions(array(
            'ssl' => array(
                'allow_self_signed' => true,
                'verify_peer' => false
            )
        ));

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom(['tangocalendar.ua@gmail.com' => 'Александр Фатюхин'])
        ->setTo(['virikidorhom@gmail.com'])
        ->setBody('Here is the message itself')
        //->attach(Swift_Attachment::fromPath('test.php'))
    ;

// Send the message
    $result = $mailer->send($message);
    var_dump(['res' => $result]);
} catch (Exception $e) {
    var_dump($e->getMessage());
    echo '<pre>' . print_r($e->getTrace(), 1);
}