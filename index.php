<html>
    <head>
        <title>Home - Site simples - Fábio Tavares</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>

    <?php require_once("menu.php"); ?>

    <body>
    <div>
        <?php
            $pagina = $_GET["page"].".php";
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