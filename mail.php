<?php

if (isset($_POST)) {
    // contact@arnconsulting.fr

    $to      = 'noelmeb12@gmail.com';
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = 
    [
        'From' => $_POST['sender'],
        'Reply-To' => $_POST['sender'],
        'X-Mailer' => 'PHP/' . phpversion()
    ];
    
    var_dump(mail($to, $subject, $message, $headers));
}