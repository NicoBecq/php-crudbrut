<?php 
$title = 'Ajouter un contact';
require_once 'Controller/addContactCtrl.php';
?>


<?php ob_start() ?>
<div class="container bg-white rounded mt-5">
    <h1 class="text-center">Ajouter un contact</h1>
    <hr/>
    <form action="#" method="POST">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <label for="lastName" name="lastName" class="input-group-text">Nom de famille :</label>
            </div>
            <input type="text" name="lastName" class="form-control" value="<?php echo (isset($lastName)) ? $lastName : '' ?>"/>
        </div>
        <?php 
            if (isset($errors['lastName']))
            {
                ?>
                <ul class="alert alert-danger list-unstyled">
                <?php
                foreach($errors['lastName'] as $error)
                {
                    echo '<li>' . $error . '</li>';
                }
                ?>
                </ul>
                <?php
            } 
        ?>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <label for="firstName" name="firstName" class="input-group-text">Prénom :</label>
            </div>
            <input type="text" name="firstName" class="form-control" value="<?php echo (isset($firstName)) ? $firstName : '' ?>"/>
        </div>
        <?php 
            if (isset($errors['firstName']))
            {
                ?>
                <ul class="alert alert-danger list-unstyled">
                <?php
                foreach($errors['firstName'] as $error)
                {
                    echo '<li>' . $error . '</li>';
                }
                ?>
                </ul>
                <?php
            } 
        ?>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <label for="mail" name="mail" class="input-group-text">Adresse mail :</label>
            </div>
            <input type="text" name="mail" class="form-control" value="<?php echo (isset($mail)) ? $mail : '' ?>"/>
        </div>
        <?php echo (isset($errors['mail'])) ? '<p class="alert alert-danger">' . $errors['mail'] . '</p>' : '' ?>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <label for="phoneNumber" name="phoneNumber" class="input-group-text">Numéro de téléphone :</label>
            </div>
            <input type="text" name="phoneNumber" class="form-control" value="<?php echo (isset($phoneNumber)) ? $phoneNumber : '' ?>"/>
        </div>
        <?php echo (isset($errors['phoneNumber'])) ? '<p class="alert alert-danger">' . $errors['phoneNumber'] . '</p>' : '' ?>
        <?php echo (isset($errors['success'])) ? '<p class="alert alert-success">' . $errors['success'] . '</p>' : '' ?>
        <?php echo (isset($errors['falure'])) ? '<p class="alert alert-danger">' . $errors['failure'] . '</p>' : '' ?>
        <button type="submit" class="btn btn-success mb-2">Ajouter</button>
        <a href="index.php" class="btn btn-warning mb-2">Retour</a>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>