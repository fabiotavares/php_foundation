<?php
session_start();

autorizaAcesso();
atualizaSessao();

//Pesquisa título e conteúdo de HOME
$sql = "SELECT titulo, conteudo FROM paginas WHERE nome = 'home';";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(\PDO::FETCH_ASSOC);
$titulo = $result['titulo'];
$conteudo = $result["conteudo"];

?>

<div class="container">
    <div class="row">
        <div class="page-header">
            <h5>Editando a página Home</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form name="fHome" class="form-horizontal" action="src/pages/admin/home_executar.php" method="POST">
                <div class="form-group">
                    <label>Título: <input type="text" name="tituloHome" class="span9 form-control" placeholder="Titulo"
                                         value="<?php echo $titulo; ?>" required/></label><br />
                </div>
                <div class="form-group">
                    <textarea name="conteudoHome" id="conteudoHome" placeholder="Conteudo" required>
                        <?php echo $conteudo; ?>
                    </textarea>
                    <script>
                        // CKEditor
                        CKEDITOR.replace("conteudoHome");
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