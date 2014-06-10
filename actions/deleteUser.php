<?php
	include_once("../models/User.php");
	User::delete($_POST['id']);
?>


<html>
<head>
	<meta charset="utf-8" />
	<title>Criação de utilizador</title>
</head>

<body>

	O seu pedido para eliminar o utilizador foi enviado ao servidor! <br />
	A redirecionar para a página inicial.

	<?php
		header('Refresh: 5; "../"');
	?>
</body>
</html>