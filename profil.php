<?php
$title = 'Profil';
require_once 'Controller/profilCtrl.php';

if (isset($_GET['contact']))
{
    if (!empty($_GET['contact']))
    {
        if ($contact != null)
        {
            ob_start(); ?>
            <div class="container mt-5 bg-white rounded">
                <h1 class="text-center">Profil</h1>
                <hr/>
                <form action="#" method="POST">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="lastName">Nom de famille :</label>
                        </div>
                        <input type="text" name="lastName" value="<?php echo (isset($lastName)) ? $lastName : $contact[0][1] ?>" class="form-control"/>
                    </div>
                    <?php 
                    if (isset($errors['lastName']))
                    {
                        ?>
                        <ul class="alert alert-danger list-unstyled">
                        <?php
                            foreach($errors['lastName'] as $error)
                            {
                                ?>
                                <li><?= $error ?></li>
                                <?php
                            }
                        ?>
                        </ul>
                        <?php
                    }
                    ?>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="firstName">Prénom :</label>
                        </div>
                        <input type="text" name="firstName" value="<?php echo (isset($firstName)) ? $firstName : $contact[0][2] ?>" class="form-control"/>
                    </div>
                    <?php
                    if (isset($errors['firstName']))
                    {
                        ?>
                        <ul class="alert alert-danger list-unstyled">
                            <?php
                            foreach($errors['firstName'] as $error)
                            {
                                ?>
                                <li><?= $error ?></li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                    }
                    ?>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="mail">Adresse mail :</label>
                        </div>
                        <input type="text" name="mail" value="<?= $contact[0][3] ?>" class="form-control"/>
                    </div>
                    <?php echo (isset($errors['mail'])) ? '<p class="alert alert-danger">' . $errors['mail'] . '</p>' : '' ?>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="phoneNumber">Numéro de téléphone :</label>
                        </div>
                        <input type="text" name="phoneNumber" value="<?= $contact[0][4] ?>" class="form-control"/>
                    </div>
                    <?php echo (isset($errors['phoneNumber'])) ? '<p class="alert alert-danger">' . $errors['phoneNumber'] . '</p>' : '' ?>
                    <?php echo (isset($errors['success'])) ? '<p class="alert alert-success">' . $errors['success'] . '</p>' : '' ?>
                    <?php echo (isset($errors['failure'])) ? '<p class="alert alert-danger">' . $errors['failure'] . '</p>' : '' ?>
                    <input type="hidden" name="id" value="<?= $contact[0][0] ?>"/>
                    <button type="submit" class="btn btn-success mb-2">Modifier</button>
                    <a href="index.php" class="btn btn-warning mb-2">Retour</a>
                </form>
            </div>
            <?php $content = ob_get_clean();
        }
        else 
        {
            echo 'Erreur 404';
        }
    }
    else 
    {
        echo 'Erreur 404';
    }
}
else 
{
    echo 'Erreur 404';
}

require 'template.php'; ?>