<?php
$title = 'Profil';
require_once 'Controller/controller.php';

if (isset($_GET['contact']))
{
    if (!empty($_GET['contact']))
    {
        $contact = getContacts($_GET['contact']);
        if ($contact != null)
        {
            ob_start(); ?>
            <div class="container mt-5 bg-white rounded">
                <h1 class="text-center">Profil</h1>
                <hr/>
                <form action="update.php" method="POST">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="lastName">Nom de famille :</label>
                        </div>
                        <input type="text" name="lastName" value="<?= $contact[0][1] ?>" class="form-control"/>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="firstName">Prénom :</label>
                        </div>
                        <input type="text" name="firstName" value="<?= $contact[0][2] ?>" class="form-control"/>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="mail">Adresse mail :</label>
                        </div>
                        <input type="text" name="mail" value="<?= $contact[0][3] ?>" class="form-control"/>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="phoneNumber">Numéro de téléphone :</label>
                        </div>
                        <input type="text" name="phoneNumber" value="<?= $contact[0][4] ?>" class="form-control"/>
                    </div>
                    <?php 
                        if (isset($_GET['error']))
                        {
                            switch($_GET['error'])
                            {
                                case '0':
                                    echo '<p class="alert alert-success">Contact modifié avec succès</p>';
                                    break;
                                case '1':
                                    echo '<p class="alert alert-danger">Une erreur est survenue, veuileez réessayer.</p>';
                                    break;
                                case 'empty':
                                    echo '<p class="alert alert-danger">Un des champ n\'est pas renseigné, veuillez remplir tous les champs.</p>';
                                    break;
                                default:
                                    break;
                            }
                        }
                        else if (isset($_GET['errors']))
                        {
                            $errors = unserialize($_GET['errors']);
                            ?>
                            <ul class="alert alert-danger">
                            <?php
                            foreach($errors as $error)
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
                    <input type="hidden" name="id" value="<?= $contact['idContact'] ?>"/>
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