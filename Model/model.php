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