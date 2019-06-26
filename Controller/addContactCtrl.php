<?php
require 'model/model.php';

if (empty($_POST['lastName']) && empty($_POST['firstName']) && empty($_POST['mail']) && empty($_POST['phoneNumber']))
{
}
else
{
    $nameRegex = "#^[A-Za-zéàèêëïîç\- ]+$#";
    $mailRegex = "#^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$#";
    $phoneRegex = "#^((\+)33|0)[1-9](\d{2}){4}$#";

    $errors = array();

    $isValid = true;
    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $mail = htmlspecialchars($_POST['mail']);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);

    if (!empty($lastName))
    {
        if (!preg_match($nameRegex, $lastName))
        {
            if (strlen($lastName) >= 50)
            {
                $isValid = false;
                $errors['lastName'][] = "Le nom comporte trop de caractères.";
            }
            $isValid = false;
            $errors['lastName'][] = "Le nom n'est pas valide.";
        }
    }
    else 
    {
        $isValid = false;
        $errors['lastName'][] = "Ce champ est requis.";
    }

    if (!empty($firstName))
    {
        if (!preg_match($nameRegex, $firstName))
        {
            if (strlen($firstName) >= 50)
            {
                $isValid = false;
                $errors['firstName'][] = "Le prénom comporte trop de caractères.";
            }
            $isValid = false;
            $errors['firstName'][] = "Le prénom n'est pas valide.";
        }
    }
    else
    {
        $isValid = false;
        $errors['firstName'][] = "Ce champ est requis.";
    }

    if (!empty($mail))
    {
        if (!preg_match($mailRegex, $mail))
        {
            $isValid = false;
            $errors['mail'] = 'L\'adresse mail n\'est pas valide.';
        }
    }
    else
    {
        $isValid = false;
        $errors['mail'] = "Ce champ est requis.";
    }

    if (!empty($phoneNumber))
    {
        if (!preg_match($phoneRegex, $phoneNumber))
        {
            $isValid = false;
            $errors['phoneNumber'] = 'Le numéro de téléphone n\'est pas valide.';
        }
    }
    else
    {
        $isValid = false;
        $errors['phoneNumber'] = "Ce champ est requis.";
    }

    if ($isValid)
    {
        $success = createContact($lastName, $firstName, $mail, $phoneNumber);
        if ($success)
        {
            $errors['success'] = 'Contact ajouté avec succès.';
        }
        else
        {
            $errors['failure'] = 'Un problème est survenue, veuillez réessayer.';
        }
    }
}