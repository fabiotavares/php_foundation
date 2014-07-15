<?php

//executa fixtures para criar/alimentar banco de dados
require_once('includes/fixtures.php');

//tenta conexão com o banco de dados
require_once('includes/conexao.php');


//Obtém o nome da página que o usuário deseja visualizar
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

//página solicitada pelo usuário:
$paginaSolicitada = getPaginaSolicitada();

//Possíveis contextos da solicitação:
//Caso1: se não for uma página válida exibe erro 404
if ($paginaSolicitada == "404") {
    $getConteudo = function () {
        require_once('includes/404.php');
    };
} elseif (isset($_POST["_contato"]) && $_POST["_contato"] == 1) {
    //Caso2: exibe conteúdo digitado no formulário de contato
    $getConteudo = function () use ($conn) {
        echo '<div class="page-header"><h3>Confirmação de contato</h3><p>Dados enviados com sucesso:</p>'.
            '<p><b>* Nome</b>: '.$_POST['nome'].'</p>'.
            '<p><b>* Email</b>: '.$_POST['email'].'</p>'.
            '<p><b>* Assunto</b>: '.$_POST['assunto'].'</p>'.
            '<p><b>* Mensagem</b>: '.$_POST['mensagem'].'</p></div>';
    };
} elseif (isset($_POST["_pesquisa"]) && $_POST["_pesquisa"] == 1) {
    //Caso3: exibe resultado do formulário de pesquisa
    $query = "%{$_POST['_termo']}%";

    $getConteudo = function () use ($conn, $query) {
        $sql = "SELECT * FROM paginas WHERE conteudo LIKE :query";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("query", $query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        echo '<div class="page-header"><h4>Pesquisa</h4>';
        if (count($result)) { //encontrou algum resultado
            foreach ($result as $pagina) {
                echo "<a href=\"{$pagina['nome']}\">{$_POST['_termo']} >> ".strtoupper($pagina['nome'])."</a><br />";
            }
        } else { //não encontrou resultado para o termo pesquisado
            echo '<p>O termo pesquisado não foi encontrado.</p>';
        }
        echo "</div>";
    };
} else {
    //Caso4: exibe conteúdo armazenado no banco de dados
    $getConteudo = function () use ($conn, $paginaSolicitada) {
        $sql = "SELECT conteudo FROM paginas WHERE nome = :pagina";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("pagina", $paginaSolicitada);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        echo $result["conteudo"];
    };
}
