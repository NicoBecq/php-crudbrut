<?php
require 'Controller/controller.php';

$mailRegex = "#^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$#";
$phoneRegex = "#^((\+)33|0)[1-9](\d{2}){4}$#";


$id = $_POST['id'];

$errors = array();
$isValid = true;

if (empty($_POST['lastName']) || empty($_POST['firstName']) || empty($_POST['mail']) || empty($_POST['phoneNumber']))
{
    $isValid = false;
    $errors[] = 'Tous les champs sont requis.';
}
else
{
    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $mail = htmlspecialchars($_POST['mail']);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
}

if (!preg_match($mailRegex, $mail))
{
    $isValid = false;
    $errors[] = 'L\'adresse mail n\'est pas valide.';
}

if (!preg_match($phoneRegex, $phoneNumber))
{
    $isValid = false;
    $errors[] = 'Le numéro de téléphone n\'est pas valide.';
}

if ($isValid)
{
    $success = updateContact($lastName, $firstName, $mail, $phoneNumber, $id);
    if ($success)
    {
        header ('Location: profil.php?contact=' . $id . '&error=0');
    }
    else 
    {
        header('Location: profil.php?contact=' . $id . '&error=1');   
    }
}
else
{
    $serializedErrors = serialize($errors);
    header ('Location: profil.php?contact=' . $id . '&errors=' . $serializedErrors);
}