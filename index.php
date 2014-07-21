<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();

require_once("src/functions/rotas.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Site Simples - Fábio Tavares</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- ckeditor -->
    <script src="ckeditor/ckeditor.js"></script>
</head>

<div class="container">

    <?php require_once("src/pages/menu.php"); ?>

    <body>
        <?php
            //verifica se deve exibir resultado de pesquisa
            if (isset($_POST["_pesquisa"]) && $_POST["_pesquisa"] == 1) {
                require_once("src/pages/pesquisa.php");
            } else { //segue para a página solicitada
                require_once(getRota(getPaginaURI()));
            }
        ?>
    </body>

    <?php require_once("src/pages/footer.php"); ?>

</div>

</html>
