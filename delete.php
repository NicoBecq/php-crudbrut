<?php
require 'Controller/controller.php';

if (isset($_GET['contact']))
{
    $success = deleteContact($_GET['contact']);
    header('Location: index.php');
}

?>