<?php

if (isset($_POST['send'])) {

    if (fields_required() > 0) {
        return false;
    }

    $to      = 'contact@arnconsulting.fr';
    $subject = $_POST['subject'];
    $message = wordwrap($_POST['message'], 70, "\r\n") . 
    "\n" . "Nom et prénoms : ". $_POST['fullname']. 
    "\n" . "Téléphone : ". $_POST['phone'];
    
    $headers = 
    [
        'From' => $_POST['sender'],
        'Reply-To' => $_POST['sender'],
        'X-Mailer' => 'PHP/' . phpversion()
    ];
    
    return mail($to, $subject, $message, $headers);
}

function fields_required() {

    $errors = 0;

    foreach($_POST as $field) {
        if (empty($field)) $errors++;
    }

    return $errors - 1;
}

function required(string $field) {

    if (empty($_POST)) return;

    return !empty($_POST[$field]) ? '' : 
    '<small class="text-danger">Ce champ est obligatoire</small>';
}


return false;