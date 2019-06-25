<?php
require 'Controller/controller.php';

$mailRegex = "#^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$#";
$phoneRegex = "#^((\+)33|0)[1-9](\d{2}){4}$#";

$errors = array();

$isValid = true;
$lastName = htmlspecialchars($_POST['lastName']);
$firstName = htmlspecialchars($_POST['firstName']);
$mail = htmlspecialchars($_POST['mail']);
$phoneNumber = htmlspecialchars($_POST['phoneNumber']);

function nameValidation($name)
{
    $nameRegex = "#^[A-Za-zéàèêëïîç\- ]+$#";
    if (!preg_match($nameRegex, $name))
    {
        if (strlen($name) >= 50)
        {
            $isValid = false;
            $errors[] = "Le nom ou prénom comporteent trop de caractères.";
        }
        $isValid = false;
        $errors[] = "Le nom ou le prénom ne sont pas valides.";
        return $errors; 
    }
}

if (empty($lastName) || empty($firstName) || empty($mail) || empty($phoneNumber))
{
    $isValid = false;
    $errors[] = 'Tous les champs doivent être remplis.';
}

$errors[] = nameValidation($lastName)[0];

$errors[] = nameValidation($firstName)[0];

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
    $success = createContact($lastName, $firstName, $mail, $phoneNumber);
    if ($success)
    {
        header('Location: addContact.php?error=0');
    }
}
else 
{
    $error = serialize($errors);
    header('Location: addContact.php?error=' . $error);
}