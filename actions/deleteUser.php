<?php
error_reporting(E_ERROR);
$htmlStart = "<html><head>
	<meta charset=\"utf-8\" />
	<title>Eliminação de utilizador</title>
</head>

<body>";
$htmlClose = " <br /> A redirecionar para a página inicial.</body></html>";

    include_once("../models/User.php");
    
    $response = User::delete($_POST['id']);
    $createOK = $response instanceof SimpleXMLElement;
    header('Refresh: 5; "../"');
    echo $htmlStart;
    if ($createOK) {
	echo "Utilizador apagado com sucesso";
    } else {
        echo "Houve um problema ao tentar apagar o utilizador.";
    }
    echo $htmlClose;


