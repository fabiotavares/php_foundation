<?php
//tenta conexão com o banco de dados
require_once('conexao.php');

//Obtém o nome da página que o usuário deseja visualizar...............................................................

function getPaginaSolicitada()
{
    $rota = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    //retorna o resultado sem o primeiro caracter (/) e em minúsculas
    $pagina = strtolower(substr($rota["path"], 1));

    //rotas válidas no site:
    $rotasValidas = [
        "" => "home",
        "home" => "home",
        "index" => "home",
        "index.php" => "home",
        "empresa" => "empresa",
        "produtos" => "produtos",
        "servicos" => "servicos",
        "contato" => "contato"
    ];

    //verifica se a página solicitada é válida e coverte para o nome correto existente no banco de dados
    if (array_key_exists($pagina, $rotasValidas)) {
        $pagina = $rotasValidas[$pagina];
    } else {
        $pagina = "404";
    }
    return $pagina;
}

//Obtém conteúdo o ser exibido.........................................................................................

//Exibe resultado do formulário de pesquisa
if (isset($_POST["_pesquisa"]) && $_POST["_pesquisa"] == 1) {
    $getConteudo = function () use ($conn) {
        $query = "%{$_POST['_termo']}%";
        require_once('/pages/pesquisa.php'); //exibe resultado do formulário de pesquisa
    };
} else {
    //Exibe conteúdo da página solicitada ou resultado do formulário de contato
    $getConteudo = function () use ($conn) {
        $paginaSolicitada = getPaginaSolicitada();
        if ($paginaSolicitada == '404'): //página inexistente
            require_once('/pages/404.php');
        elseif ($paginaSolicitada == 'contato'): //resultado do formulário tratado em contato.php
            require_once('/pages/contato.php');
        else:
            require_once('/pages/paginas.php'); //demais resultados buscados do banco de dados
        endif;
    };
}
