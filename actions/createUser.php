<?php
$html = "<html>
<head>
	<meta charset=\"utf-8\" />
	<title>Criação de utilizador</title>
</head>

<body>

	O utilizador foi criado! <br />
	A redirecionar para a página inicial.
</body>
</html>";
    include_once("../models/User.php");
    $myData = array(
        "name" => $_POST["name"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "email" => $_POST["email"],
        "site" => $_POST["site"],
        "cityId" => $_POST["cityId"]
    );
    print_r($myData);
    
    $response = User::add($myData);
    $deleteOK = $response instanceof SimpleXMLElement;
    if ($deleteOK) {
	header('Refresh: 5; "../"');
        echo $html;
    } else {
        echo $response;
    }
