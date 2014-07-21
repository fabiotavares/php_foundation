<?php
session_start();

autorizaAcesso();
atualizaSessao();

//Pesquisa título e conteúdo de EMPRESA
$sql = "SELECT titulo, conteudo FROM paginas WHERE nome = 'empresa';";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(\PDO::FETCH_ASSOC);
$titulo = $result['titulo'];
$conteudo = $result["conteudo"];

?>

<div class="container">
    <div class="row">
        <div class="page-header">
            <h5>Editando a página Empresa</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form name="fEmpresa" class="form-horizontal" action="src/pages/admin/empresa_executar.php" method="POST">
                <div class="form-group">
                    <label>Título: <input type="text" name="tituloEmpresa" class="span9 form-control" placeholder="Titulo"
                                         value="<?php echo $titulo; ?>" required/></label><br />
                </div>
                <div class="form-group">
                    <textarea name="conteudoEmpresa" id="conteudoEmpresa" placeholder="Conteudo" required>
                        <?php echo $conteudo; ?>
                    </textarea>
                    <script>
                        // CKEditor
                        CKEDITOR.replace("conteudoEmpresa");
                    </script>
                </div>
                <div class="form-group"><br />
                    <a href="/admin" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>