<html>
<head>
	<meta charset="utf-8" />
	<title>Index para o registo de utilizadores</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
	<h1>Escolha uma opção:</h1>
	<button id="registerUser">Registar novo utilizador</button>
	<button id="listUsers">Listar utilizadores</button><br /><br /><br />

	<div id="usersList">
		<img id="loadingImage" src="img/loading.gif"/>
		<table id="resultsTable">
			<thead>
				<tr>
					<td>Username</td>
					<td>Nome</td>
					<td>Email</td>
					<td>Website</td>
					<td>País</td>
					<td>Cidade</td>
					<td>Operações</td>
				</tr>
			<thead>
			<tbody>
			</tbody>
		</table>
	</div>
	
	<form id="registerUserForm" action="actions/createUser.php" 
		method="POST" action="createUser.php">
		<table>
			<tr>
				<td>Username</td>
				<td>
					<input class="input" type="text" name="username" required/>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input class="input" type="password" name="password" required/>
				</td>
			</tr>
			<tr>
				<td>Nome</td>
				<td>
					<input class="input" type="text" name="name" required/>
				</td>
			</tr>			
			<tr>
				<td>Email</td>
				<td>
					<input class="input" type="text" name="email"/>
				</td>
			</tr>
			<tr>
				<td>Website</td>
				<td>
					<input class="input" type="text" name="site"/>
				</td>
			</tr>
			<tr>
				<td>País</td>
				<td>
					<select class="input" name="country" id="country"/>
						<option selected="selected" value=0>
							Escolha um país
						</option>
						<?php
							require_once("helpers/CHtml.php");
							require_once("models/Country.php");
							echo CHtml::compileSelectOptions(Country::getNames());
						?>
					</select>
				</td>
			</tr>
			<tr id="citySelector">
				<td>Cidade</td>
				<td>
					<select class="input" name="username" id="city" required>						
						<option selected="selected" value=0>
							Escolha uma cidade
						</option>
					</select>
				</td>
			</tr>
		</table>
		<button id="submitButton" type="button">Criar</button>
	</form>
	<script src="//code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/scripts.js"></script>
</body>
</html>