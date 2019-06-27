<?php
require '../Model/model.php';

if (isset($_GET['contact']))
{
    deleteContact($_GET['contact']);
    header('Location: ../index.php');
}