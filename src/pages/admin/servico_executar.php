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
            //atualiza o registro SERVIÇOS da tabela PÁGINAS
            $sql = "UPDATE paginas SET titulo = :titulo WHERE nome = 'servicos';";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("titulo", $_REQUEST["tituloServicos"]);
            $stmt->execute();
            //redireciona para admin
            $_SESSION["mensagem"] = "<div class='alert alert-success'>Página Serviços atualizada com sucesso</div>";
            header('Location: /admin');

        } elseif ($_REQUEST['operacao'] == 'apagar') {
            //apaga o registro do serviço selecionado
            $sql = "DELETE FROM servicos WHERE id = :idServico;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("idServico", $_REQUEST["idServico"]);
            $stmt->execute();
            //redireciona para a lista de serviços
            $_SESSION["mensagem"] = "<div class='alert alert-success'>Serviço apagado com sucesso</div>";
            header('Location: /servicos_');

        } elseif ($_REQUEST['operacao'] == 'editar') {
            //atualiza o registro do serviço editado
            $sql = "UPDATE servicos SET nome = :nome, descricao = :descricao WHERE id = :idServico;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("nome", $_REQUEST["nomeServico"]);
            $stmt->bindParam("descricao", $_REQUEST["descricaoServico"]);
            $stmt->bindParam("idServico", $_REQUEST["idServico"]);
            $stmt->execute();

            $_SESSION["mensagem"] = "<div class='alert alert-success'>Serviço atualizado com sucesso</div>";
            header('Location: /servicos_');

        } elseif ($_REQUEST['operacao'] == 'novo') {
            //cadastro novo serviço
            $sql = "INSERT INTO servicos (nome, descricao) VALUES (:nome, :descricao);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("nome", $_REQUEST["nomeServico"]);
            $stmt->bindParam("descricao", $_REQUEST["descricaoServico"]);
            $stmt->execute();

            $_SESSION["mensagem"] = "<div class='alert alert-success'>Serviço cadastrado com sucesso</div>";
            header('Location: /servicos_');
        }
    } else {
        $_SESSION["mensagem"] = "<div class='alert alert-error'>Erro inesperado com Serviços</div>";
        header('Location: /admin');
    }

} catch (\PDOException $ex) {
    $_SESSION["mensagem"] = "<p class='text-error'>Erro ao atualizar a página Serviços</p>";
    header('Location: /admin');
}