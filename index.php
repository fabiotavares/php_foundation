<?php require_once("includes/rotas.php"); ?>

<html>
<head>
    <title>Site Simples - Fábio Tavares</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<div class="container">

    <?php require_once("includes/menu.php"); ?>

    <body>
    <?php $getConteudo(); ?>
    </body>

    <?php require_once("includes/footer.php"); ?>

</div>

</html>
