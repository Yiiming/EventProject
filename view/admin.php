<?php

include "../controller/backoffice/controlAdmin.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion admin</title>
</head>
<body>
	<form action="" method="POST">
		login : <input type="text" name="login"><br />
		pass : <input type="password" name="pass"><br />
		question secrète : Quel est le nom du prof de PHP : <input type="text" name="secret"><br />
		<input type="submit" name="OK" value="connecter">
	</form>
</body>
</html>