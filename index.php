<html>
    <head>
        <title>Home - Site simples - Fábio Tavares</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>

    <?php require_once("menu.php"); ?>

    <body>
    <div>
        <?php
            //armazena a página que deseja acessar
            if(! isset($_GET["page"])){
                $pagina = "home.php";
            } else{
                $pagina = $_GET["page"].".php";
            }
            //verifica se a página existe no sistema
            if(file_exists($pagina))
            {
                require_once($pagina);
            } else
            {
                require_once("erro.php");
            }
        ?>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </div>
    </body>

    <?php require_once("footer.php"); ?>
</html>