<?php
error_reporting(E_ERROR);
$htmlStart = "<html><head>
	<meta charset=\"utf-8\" />
	<title>Criação de utilizador</title>
</head>

<body>";
$htmlClose = " <br /> A redirecionar para a página inicial.</body></html>";

    include_once("../models/User.php");
    
    $response = User::add($_POST);
    $createOK = $response instanceof SimpleXMLElement;
    header('Refresh: 5; "../"');
    echo $htmlStart;
    if ($createOK) {
	echo "Utilizador criado com sucesso";
    } else {
        echo "Houve um problema ao tentar criar o utilizador.";
    }
    echo $htmlClose;
