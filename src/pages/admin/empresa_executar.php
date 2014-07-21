<?php
session_start();

require_once(__DIR__."/../../functions/conexao.php");
require_once(__DIR__."/../../functions/uteis.php");

atualizaSessao (); //para ignorar a possível demora na edição
autorizaAcesso();


try {
    //atualiza o registro HOME da tabela PÁGINAS
    $sql = "UPDATE paginas SET titulo = :titulo, conteudo = :conteudo WHERE nome = 'empresa';";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("titulo", $_REQUEST["tituloEmpresa"]);
    $stmt->bindParam("conteudo", $_REQUEST["conteudoEmpresa"]);
    $stmt->execute();

    $_SESSION["mensagem"] = "<div class='alert alert-success'>Página Empresa atualizada com sucesso</div>";
    header('Location: /admin');
} catch (\PDOException $ex) {
    $_SESSION["mensagem"] = "<div class='alert alert-error'>Erro ao atualizar a página Empresa</div>";
    header('Location: /admin');
}

