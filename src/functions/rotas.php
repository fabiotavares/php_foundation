<?php

require_once(__DIR__."/conexao.php");
require_once(__DIR__."/uteis.php");

//retorna a rota para a página solicitada
//retrona 404 se não existir
function getRota($pagina)
{
    $rotasValidas = [
        "home" => "src/pages/paginas.php",
        "empresa" => "src/pages/paginas.php",
        "produtos" => "src/pages/paginas.php",
        "servicos" => "src/pages/paginas.php",
        "contato" => "src/pages/contato.php",
        "admin" => "src/pages/admin/admin.php",
        "login" => "src/pages/admin/login.php",

        "logout" => "src/pages/admin/logout.php",
        "home_" => "src/pages/admin/home_.php",
        "empresa_" => "src/pages/admin/empresa_.php",
        "produtos_" => "src/pages/admin/produtos_.php",
        "produto_" => "src/pages/admin/produto_.php",
        "servicos_" => "src/pages/admin/servicos_.php",
        "servico_" => "src/pages/admin/servico_.php"
    ];

    //verifica se existe uma rota para a página solicitada
    if (array_key_exists(strtolower($pagina), $rotasValidas)) {
        return $rotasValidas[$pagina];
    } else {
        return "src/pages/404.php"; //retorna rota para 404.php
    }
}

function getPaginaURI()
{
    //obtém a uri completa
    $rota = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    //obtém a página digitada, convertendo para home se necessário
    $pagina = strtolower(substr($rota["path"], 1));
    if (($pagina == "") || ($pagina == "index") || ($pagina == "index.php")) {
        $pagina = "home";
    }
    return $pagina;
}
