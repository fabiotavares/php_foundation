<?php
session_start();

require_once(__DIR__."/../../functions/conexao.php");
require_once(__DIR__."/../../functions/uteis.php");

atualizaSessao (); //para ignorar a possível demora na edição
autorizaAcesso();

try {
    if(isset($_REQUEST['operacao'])) {

        //verifica qual operação deve ser executada
        if($_REQUEST['operacao'] == 'atualizarTitulo') {
            //atualiza o registro PRODUTOS da tabela PÁGINAS
            $sql = "UPDATE paginas SET titulo = :titulo WHERE nome = 'produtos';";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("titulo", $_REQUEST["tituloProdutos"]);
            $stmt->execute();
            //redireciona para admin
            $_SESSION["mensagem"] = "<div class='alert alert-success'>Página Produtos atualizada com sucesso</div>";
            header('Location: /admin');

        } elseif ($_REQUEST['operacao'] == 'apagar') {
            //apaga o registro do produto selecionado
            $sql = "DELETE FROM produtos WHERE id = :idProduto;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("idProduto", $_REQUEST["idProduto"]);
            $stmt->execute();
            //redireciona para a lista de produtos
            $_SESSION["mensagem"] = "<div class='alert alert-success'>Produto apagado com sucesso</div>";
            header('Location: /produtos_');

        } elseif ($_REQUEST['operacao'] == 'editar') {
            //atualiza o registro do produto editado
            $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao WHERE id = :idProduto;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("nome", $_REQUEST["nomeProduto"]);
            $stmt->bindParam("descricao", $_REQUEST["descricaoProduto"]);
            $stmt->bindParam("idProduto", $_REQUEST["idProduto"]);
            $stmt->execute();

            $_SESSION["mensagem"] = "<div class='alert alert-success'>Produto atualizado com sucesso</div>";
            header('Location: /produtos_');

        } elseif ($_REQUEST['operacao'] == 'novo') {
            //cadastro novo produto
            $sql = "INSERT INTO produtos (nome, descricao) VALUES (:nome, :descricao);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("nome", $_REQUEST["nomeProduto"]);
            $stmt->bindParam("descricao", $_REQUEST["descricaoProduto"]);
            $stmt->execute();

            $_SESSION["mensagem"] = "<div class='alert alert-success'>Produto cadastrado com sucesso</div>";
            header('Location: /produtos_');
        }
    } else {
        $_SESSION["mensagem"] = "<div class='alert alert-error'>Erro inesperado com Produtos</div>";
        header('Location: /admin');
    }

} catch (\PDOException $ex) {
    $_SESSION["mensagem"] = "<p class='text-error'>Erro ao atualizar a página Produtos</p>";
    header('Location: /admin');
}