<?php $title = 'Ajouter un contact'; ?>

<?php ob_start() ?>
<div class="container bg-white rounded mt-5">
    <h1 class="text-center">Ajouter un contact</h1>
    <hr/>
    <form action="insertContact.php" method="POST">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <label for="lastName" name="lastName" class="input-group-text">Nom de famille :</label>
            </div>
            <input type="text" name="lastName" class="form-control"/>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <label for="firstName" name="firstName" class="input-group-text">Prénom :</label>
            </div>
            <input type="text" name="firstName" class="form-control"/>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <label for="mail" name="mail" class="input-group-text">Adresse mail :</label>
            </div>
            <input type="text" name="mail" class="form-control"/>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <label for="phoneNumber" name="phoneNumber" class="input-group-text">Numéro de téléphone :</label>
            </div>
            <input type="text" name="phoneNumber" class="form-control"/>
        </div>
            <?php
            if (isset($_GET['error']))
            {
                if ($_GET['error'] == '0')
                {
                    ?>
                    <div class="alert alert-success">
                        Contact ajouté avec succès
                    </div>
                    <?php
                }
                else 
                {
                    ?>
                    <div class="alert alert-danger">
                        <ul>
                        <?php
                        $errors = unserialize($_GET['error']);
                        foreach($errors as $error)
                        {
                            ?>
                            <li><?= $error ?></li>
                            <?php
                        }
                        ?>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>
            
        <button type="submit" class="btn btn-success mb-2">Ajouter</button>
        <a href="index.php" class="btn btn-warning mb-2">Retour</a>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>