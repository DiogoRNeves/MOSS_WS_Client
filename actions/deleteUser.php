<?php
$html = "<html>
<head>
	<meta charset=\"utf-8\" />
	<title>Eliminação de utilizador</title>
</head>

<body>

	O utilizador foi eliminado! <br />
	A redirecionar para a página inicial.
</body>
</html>";
    include_once("../models/User.php");
    $response = User::delete($_POST['id']);
    $deleteOK = $response instanceof SimpleXMLElement;
    if ($deleteOK) {
	header('Refresh: 5; "../"');
        echo $html;
    } else {
        echo $response;
    }


