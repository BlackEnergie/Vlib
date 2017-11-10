<?php 
session_start()?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Vlib</title>
		<style type="text/css">
			@import url(styles/vlib.css);
		</style>
	</head>
	<body>
		<?php
			include_once 'controleurs/controleurPrincipal.php';
			include_once 'vues/squeletteConnexion.php';
		?>
	</body>
</html>