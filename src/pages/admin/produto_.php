<?php
session_start();

require_once(__DIR__ . "/../../functions/conexao.php");
require_once(__DIR__ . "/../../functions/uteis.php");

atualizaSessao(); //para ignorar a possível demora na edição
autorizaAcesso();

//verifica de qual formulário em produtos_ veio a requisição
try {
    $sql = "Select * FROM produtos WHERE id = :idProduto;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("idProduto", $_REQUEST['idProduto']);
    $stmt->execute();
    $produto = $stmt->fetch(\PDO::FETCH_ASSOC);

    if (count($produto)) {
        $nome = $produto['nome'];
        $descricao = $produto['descricao'];
        $id = $produto['id'];
    } else {
        $nome = "";
        $descricao = "";
        $id = "";
    }
    $disabled = "";
    $ok = "Salvar";

    if (isset($_REQUEST['apagarProduto'])) { //devo confirmar a intenção de apagar o produto selecionado

        $titulo = "<div class='alert alert-error'>Você deseja realmente apagar o produto abaixo?</div>";
        $disabled = "disabled";
        $operacao = "apagar";
        $ok = "Apagar";

    } elseif (isset($_REQUEST['editarProduto'])) { //devo abrir os campos do produto selecionado para edição
        $titulo = "Editando Produto";
        $operacao = "editar";

    } elseif (isset($_REQUEST['novoProduto'])) { //devo abrir os campos para cadastrar novo produto
        $titulo = "Novo Produto";
        $operacao = "novo";
    } else {//não há dados de produto para exibir => redireciona para produtos_
        header('Location: /produtos_');
    }
} catch (\PDOException $ex) {
    $_SESSION["mensagem"] = "<div class='alert alert-error'>Erro ao atualizar a página Produtos</div>";
    header('Location: /admin');
}
?>

<div class="container">
    <div class="row">
        <div class="page-header">
            <h5><?php echo $titulo; ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form name="fProduto" class="form-horizontal" action="src/pages/admin/produto_executar.php" method="POST">
                <div class="form-group">
                    <label>
                        Nome: <input type="text" name="nomeProduto" class="span9 form-control" placeholder="Nome"
                                     value="<?php echo $nome; ?>" <?php echo $disabled; ?> required/>
                    </label><br/>
                </div>
                <div class="form-group">
                    <textarea name="descricaoProduto" id="descricaoProduto" placeholder="Descricao"
                        <?php echo $disabled; ?> required>
                        <?php echo $descricao; ?>
                    </textarea>
                    <script>
                        // CKEditor
                        CKEDITOR.replace("descricaoProduto");
                    </script>
                </div>
                <div class="form-group"><br/>
                    <input type='hidden' name='idProduto' value="<?php echo $id; ?>"'>
                    <input type='hidden' name='operacao' value="<?php echo $operacao; ?>"'>
                    <a href="/produtos_" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success"><?php echo $ok; ?></button>
                </div>
            </form>
        </div>
    </div>
</div>