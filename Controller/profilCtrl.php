<?php
require 'Model/model.php';

$contact = getContacts($_GET['contact']);

if (!empty($_POST['id']) || !empty($_POST['lastName']) || !empty($_POST['firstName']) || !empty($_POST['mail']) || !empty($_POST['phoneNumber'])) 
{
    $nameRegex = "#^[A-Za-zéàèêëïîç\- ]+$#";
    $mailRegex = "#^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$#";
    $phoneRegex = "#^((\+)33|0)[1-9](\d{2}){4}$#";
    
    $id = $_POST['id'];

    $errors = array();
    $isValid = true;

    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $mail = htmlspecialchars($_POST['mail']);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);

    // on vérifie lastName, si erreur, stockage du message d'erreur dans le tableau
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

    // on vérifie firstName, si erreur, stockage du message d'erreur dans le tableau
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

    // on vérifie mail, si erreur, stockage du message d'erreur dans le tableau
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
        $errors['mail'] = 'Ce champ est requis.';
    }

    // on vérifie phoneNumber, si erreur, stockage du message d'erreur dans le tableau
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
        $errors['phoneNumber'] = 'Ce champ est requis.';
    }

    /*
    Si le formulaire est valide,
        on fais la modification
        Si la méthode de modification retourne true, 
            ajout du message de succès au tableau
        Sinon,
            ajout du message d'erreur au tableau
    */
    if ($isValid)
    {
        $success = updateContact($lastName, $firstName, $mail, $phoneNumber, $id);
        if ($success)
        {
            $errors['success'] = 'Contact modifié avec succès.';
        }
        else 
        {
            $errors['failure'] = 'Echec de modification du contact, veuillez réessayer.';   
        }
    }
}