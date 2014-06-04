<html>
<head>
	<meta charset="utf-8" />
	<title>Index para o registo de utilizadores</title>
</head>

<body>
	<button id="registerUser">Registar novo utilizador</button><br />
	<button id="listarUtilizadores">Listar utilizadores</button><br /><br /><br />

	<div id="listaDeUtilizadores" />
	
	<form id="registarUtilizador" action="actions/createUser.php" method="POST">
		Username: <input class="input" type="text" name="username"/><br />
		Password: <input class="input" type="password" name="password"/><br />
		Nome: <input class="input" type="text" name="name"/><br />
		Website: <input class="input" type="text" name="site"/><br />
		País: 
			<select class="input" name="country" />
				<?php
					require_once("helpers/CHtml.php");
					require_once("models/Country.php");
					echo CHtml::compileSelectOptions(getNames(Country::getAll());
				?>
			</select><br />
		Cidade:  <input style="visibility:hidden" class="input" type="text" name="username"/><br />
	</form>
	php
</body>
</html>