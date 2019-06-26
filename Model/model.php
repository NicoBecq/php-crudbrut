<?php

function DbCon()
{
    try 
    {
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "crudbrut";
        $db = mysqli_connect($server, $username, $password, $dbname);
        return $db;
    }
    catch (PDOException $e)
    {
        die('Erreur : ' . $e->getErrorMessage());
    }
}

// SELECT query of contacts with optionnal id to search every contact or a single
function getContacts($id = "")
{
    if ($id === "")
    {
        $query = "SELECT `idContact`, `lastName`, `firstName`, `mail`, `phoneNumber` FROM `contacts`";
    }
    else
    {
        $query = "SELECT `idContact`, `lastName`, `firstName`, `mail`, `phoneNumber` FROM `contacts` WHERE `idContact` = $id";
    }
    $contacts = array();
    $db = DbCon();
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 1)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $contacts[] = $row;
        }
    }
    else if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_row($result);
        $contacts[] = $row;
    }
    mysqli_close($db);
    return $contacts; 
}

// UPDATE query for contacts
function updateContact($lastName, $firstName, $mail, $phoneNumber, $id) : bool
{
    $db = DbCon();
    $query = "UPDATE `contacts` SET `lastName` = \"$lastName\", `firstName` = \"$firstName\", `mail` = \"$mail\", `phoneNumber` = \"$phoneNumber\" WHERE `idContact` = $id";
    $result = mysqli_query($db, $query);
    mysqli_close($db);
    return $result;
}

// DELETE query for contacts
function deleteContact($id) : bool
{
    $success = false;
    $db = DbCon();
    $query = "DELETE FROM `contacts` WHERE `idContact` = $id";
    $result = mysqli_query($db, $query);
    mysqli_close($db);
    return $result;
}

// INSERT INTO query for contacts
function createContact($lastName, $firstName, $mail, $phone)
{
    $success = false;
    $db = DbCon();
    $query = "INSERT INTO `contacts`(`lastName`, `firstName`, `mail`, `phoneNumber`) VALUES ('$lastName', '$firstName', '$mail', '$phone')";
    $result = mysqli_query($db, $query);
    mysqli_close($db);
    return $result;
}