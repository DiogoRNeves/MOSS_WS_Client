<html>
<head>
	<meta charset="utf-8" />
	<title>Index para o registo de utilizadores</title>
</head>

<body>
	<button id="registerUser">Registar novo utilizador</button><br />
	<button id="listarUtilizadores">Listar utilizadores</button><br /><br /><br />

	<div id="listaDeUtilizadores" />
	
	<form id="registarUtilizador" action="actions/createUser.php" 
		method="POST" action="createUser.php">
		<table>
			<tr>
				<td>Username:</td>
				<td>
					<input class="input" type="text" name="username"/>
				</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>
					<input class="input" type="password" name="password"/>
				</td>
			</tr>
			<tr>
				<td>Nome:</td>
				<td>
					<input class="input" type="text" name="name"/>
				</td>
			</tr>
			<tr>
				<td>Website:</td>
				<td>
					<input class="input" type="text" name="site"/>
				</td>
			</tr>
			<tr>
				<td>País:</td>
				<td>
					<select class="input" name="country" />
						<?php
							require_once("helpers/CHtml.php");
							require_once("models/Country.php");
							echo CHtml::compileSelectOptions(Country::getNames());
						?>
					</select>
				</td>
			</tr>
			<tr id="citySelector" style="visibility:hidden">
				<td>Cidade:</td>
				<td>
					<input class="input" type="text" name="username"/>
				</td>
			</tr>
		</table>
		<button type="submit" value="Submit">Criar</button>
	</form>
</body>
</html>