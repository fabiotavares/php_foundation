<?php
session_start();

require_once(__DIR__ . "/../../functions/conexao.php");
require_once(__DIR__ . "/../../functions/uteis.php");

atualizaSessao(); //para ignorar a possível demora na edição
autorizaAcesso();

//verifica de qual formulário em servicos_ veio a requisição
try {
    $sql = "Select * FROM servicos WHERE id = :idServico;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("idServico", $_REQUEST['idServico']);
    $stmt->execute();
    $servico = $stmt->fetch(\PDO::FETCH_ASSOC);

    if (count($servico)) {
        $nome = $servico['nome'];
        $descricao = $servico['descricao'];
        $id = $servico['id'];
    } else {
        $nome = "";
        $descricao = "";
        $id = "";
    }
    $disabled = "";
    $ok = "Salvar";

    if (isset($_REQUEST['apagarServico'])) { //devo confirmar a intenção de apagar o serviço selecionado

        $titulo = "<div class='alert alert-error'>Você deseja realmente apagar o serviço abaixo?</div>";
        $disabled = "disabled";
        $operacao = "apagar";
        $ok = "Apagar";

    } elseif (isset($_REQUEST['editarServico'])) { //devo abrir os campos do serviço selecionado para edição
        $titulo = "Editando Servico";
        $operacao = "editar";

    } elseif (isset($_REQUEST['novoServico'])) { //devo abrir os campos para cadastrar novo serviço
        $titulo = "Novo Servico";
        $operacao = "novo";
    } else { //não há dados de serviço para exibir => redireciona para serviços_
        header('Location: /servicos_');
    }
} catch (\PDOException $ex) {
    $_SESSION["mensagem"] = "<div class='alert alert-error'>Erro ao atualizar a página Serviços</div>";
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
            <form name="fServico" class="form-horizontal" action="src/pages/admin/servico_executar.php" method="POST">
                <div class="form-group">
                    <label>
                        Nome: <input type="text" name="nomeServico" class="span9 form-control" placeholder="Nome"
                                     value="<?php echo $nome; ?>" <?php echo $disabled; ?> required/>
                    </label><br/>
                </div>
                <div class="form-group">
                    <textarea name="descricaoServico" id="descricaoServico" placeholder="Descricao"
                        <?php echo $disabled; ?> required>
                        <?php echo $descricao; ?>
                    </textarea>
                    <script>
                        // CKEditor
                        CKEDITOR.replace("descricaoServico");
                    </script>
                </div>
                <div class="form-group"><br/>
                    <input type='hidden' name='idServico' value="<?php echo $id; ?>"'>
                    <input type='hidden' name='operacao' value="<?php echo $operacao; ?>"'>
                    <a href="/servicos_" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success"><?php echo $ok; ?></button>
                </div>
            </form>
        </div>
    </div>
</div>