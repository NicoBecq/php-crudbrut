<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="Content/Style/style.css"/>
	<title><?= $title ?> | Repertoire</title>
</head>
<body>
    <div id="nav">
        <ul class="nav justify-content-end p-2">
            <li class="nav-item">
                <a class="btn btn-secondary" href="addContact.php">Ajouter un contact</a>
            </li>
        </ul>
    </div>
	<div id="main-content">
        <?= $content ?>
	</div>
	<footer class="container-fluid">
		<p class="text-center pb-3 pt-2">Designed by Nicolas Becquerel - 2019</p>
	</footer>
	<!-- Sctipts: jquery, bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- My JQ -->
	<script type="text/javascript" src="Content/Scripts/script.js"></script>
</body>
</html>