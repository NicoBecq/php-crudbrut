<?php 
$title = 'Liste des contacts';
require 'Controller/indexCtrl.php';
?>

<?php ob_start() ?>
<div class="container mt-5 bg-white rounded">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Nom de famille</th>
                <th>Prénom</th>
                <th>Adresse mail</th>
                <th>Numéro de téléphone</th>
                <th></th>
            </thead>
            <tbody class="thead-light">
                <?php
                    foreach($contacts as $contact)
                    {
                        ?>
                        <tr>
                            <td><?= $contact['lastName'] ?></td>
                            <td><?= $contact['firstName'] ?></td>
                            <td><?= $contact['mail'] ?></td>
                            <td><?= $contact['phoneNumber'] ?></td>
                            <td>
                                <a href="profil.php?contact=<?= $contact['idContact'] ?>" class="badge badge-info">Modifier</a>
                                |
                                <a href="Controller/deleteCtrl.php?contact=<?= $contact['idContact'] ?>" class="badge badge-danger delete-button">Supprimer</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>
