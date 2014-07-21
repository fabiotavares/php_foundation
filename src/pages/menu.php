<?php

require_once(__DIR__.'/../functions/uteis.php');

$home = "";
$empresa = "";
$produtos = "";
$servicos = "";
$contato = "";
$login = "";

switch(getPaginaURI()) {
    case "home":
        $home = "class='active'";
        break;
    case "empresa":
        $empresa = "class='active'";
        break;
    case "produtos":
        $produtos = "class='active'";
        break;
    case "servicos":
        $servicos = "class='active'";
        break;
    case "contato":
        $contato = "class='active'";
        break;
    case "404":
        break;
    default:
        $login = "class='active'";
}

$strlogin = function () {
    if (isLogado() && sessaoAtiva()){
        return "Administrativo";
    } else {
        return "Login";
    }
};

?>

<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li <?php echo $home; ?>><a href="home">Home</a></li>
            <li <?php echo $empresa; ?>><a href="empresa">Empresa</a></li>
            <li <?php echo $produtos; ?>><a href="produtos">Produtos</a></li>
            <li <?php echo $servicos; ?>><a href="servicos">Serviços</a></li>
            <li <?php echo $contato; ?>><a href="contato">Contato</a></li>
            <li <?php echo $login; ?>><a href="admin"><?php echo $strlogin(); ?></a></li>
        </ul>

        <form action="/" method="POST" class="navbar-search pull-right">
        <input type="text" name="_termo" class="search-query" placeholder="pesquisar..." />
        <input type="hidden" name="_pesquisa" value="1" />
        <button type="submit" class="btn btn-link">ok</button>
        </form>

    </div>
</div>

