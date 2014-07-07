<?php
    header('HTTP/1.1 404 Not Found', false, "404");
    //Controle de rotas...

    //Obtém o nome da página que o usuário deseja visualizar
    function getPaginaSolicitada() {
        $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        //retorna o resultado sem o primeiro caracter (/) e em minúsculas
        $pagina = strtolower(substr($rota["path"], 1));
        if($pagina == "" || $pagina == "index" || $pagina == "index.php") {
            header("location: http://".$_SERVER['HTTP_HOST']."/home");
        }
        return $pagina;
    }

    //Valida a rota solicitada retornando o caminho completo do recurso, caso exista!
    function getRota() {
        //rotas válidas no site:
        $rotasValidas = array("contato", "empresa", "produtos", "servicos", "home");

        //página solicitada pelo usuário:
        $pagina = getPaginaSolicitada();

        //verifica se a página solicitada existe dentro das rotas possíveis:
        if(in_array($pagina, $rotasValidas)):
            return "includes/".$pagina.".php";
        else: //página não encontrada...
            return "includes/404.php";
        endif;
    }
?>

<html>
    <head>
        <title>Home - Site simples - Fábio Tavares</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>

    <div class="container">

    <?php require_once("includes/menu.php"); ?>

    <body>
        <?php require_once(getRota()); ?>
    </body>

    <?php require_once("includes/footer.php"); ?>

    </div>

</html>
