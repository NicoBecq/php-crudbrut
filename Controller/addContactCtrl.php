<?php
require 'model/model.php';

// si tous les champs sont vides, c'est la 'première' fois qu'on navigue sur addContact, donc on n'effectue pas les vérifs.
if (!empty($_POST['lastName']) || !empty($_POST['firstName']) || !empty($_POST['mail']) || !empty($_POST['phoneNumber']))
{
    // déclarations des regexs
    $nameRegex = "#^[A-Za-zéàèêëïîç\- ]+$#";
    $mailRegex = "#^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$#";
    $phoneRegex = "#^((\+)33|0)[1-9](\d{2}){4}$#";

    // initialisation d'un tableau contenant tous les messages d'erreurs
    $errors = array();

    // booléen de validation du formulaire
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
        $errors['mail'] = "Ce champ est requis.";
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
        $errors['phoneNumber'] = "Ce champ est requis.";
    }
    
    /*
    si le formulaire est valide on effectue l'insertion en base, 
        si la méthode d'insertion renvoie true,
            stocke un message de succès dans le tableau, 
        sinon,
            stocke un message d'erreur dans le tableau
    */
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