<?php require_once("functions/rotas.php"); ?>

<html>
<head>
    <title>Site Simples - Fábio Tavares</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<div class="container">

    <?php require_once("pages/menu.php"); ?>

    <body>
    <?php $getConteudo(); ?>
    </body>

    <?php require_once("pages/footer.php"); ?>

</div>

</html>
