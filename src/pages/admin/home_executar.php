<?php
session_start();

require_once(__DIR__."/../../functions/conexao.php");
require_once(__DIR__."/../../functions/uteis.php");

atualizaSessao (); //para ignorar a possível demora na edição
autorizaAcesso();


try {
    //atualiza o registro HOME da tabela PÁGINAS
    $sql = "UPDATE paginas SET titulo = :titulo, conteudo = :conteudo WHERE nome = 'home';";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("titulo", $_REQUEST["tituloHome"]);
    $stmt->bindParam("conteudo", $_REQUEST["conteudoHome"]);
    $stmt->execute();

    $_SESSION["mensagem"] = "<div class='alert alert-success'>Página Home atualizada com sucesso</div>";
    header('Location: /admin');
} catch (\PDOException $ex) {
    $_SESSION["mensagem"] = "<div class='alert alert-error'>Erro ao atualizar a página Home</div>";
    header('Location: /admin');
}

