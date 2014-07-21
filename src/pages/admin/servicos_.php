<?php
session_start();

autorizaAcesso();
atualizaSessao();

//pesquisa título de SERVIÇOS
$sql = "SELECT titulo FROM paginas WHERE nome = 'servicos';";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(\PDO::FETCH_ASSOC);
$titulo = $result['titulo'];

//pesquisa lista de servicos
$sql = "SELECT * FROM servicos;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

$imprimeMensagem = function () {
    if (isset($_SESSION["mensagem"])) {
        echo $_SESSION["mensagem"];
        unset($_SESSION["mensagem"]);
    }
};

?>

    <div class="container">
        <div class="row">
            <div class="page-header">
                <h5>Editando a página Serviços</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <form class="form-horizontal" action="src/pages/admin/servico_executar.php" method="POST">
                    <div class="form-group">
                        <label>Título: <input type="text" name="tituloServicos" class="span9 form-control" placeholder="Titulo"
                                              value="<?php echo $titulo; ?>" required/></label>
                    </div>
                    <div class="form-group"><br />
                        <input type='hidden' name='operacao' value="atualizarTitulo"'>
                        <a href="/admin" class="btn btn-danger">Cancelar</a>
                        <button name='tituloServico' type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered table-hover">
                <caption>
                    Serviços Cadastrados
                </caption>
                <thead>
                <tr style="background: #F5F5F5">
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Opções</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $indice = 1;
                foreach($result as $servico) {
                    echo "<tr>";
                    echo "<form class='form-horizontal' action='servico_' method='POST'>";
                    echo "<td>{$indice}</td>";
                    echo "<td>{$servico['nome']}</td>";
                    echo "<td>{$servico['descricao']}</td>";
                    echo "<td>";
                    echo "<input type='hidden' name='idServico' value='".$servico['id']."'>";
                    echo "<input type='submit' name='apagarServico' value='Apagar' class='btn btn-link'>";
                    echo "<br />";
                    echo "<input type='submit' name='editarServico' value='Editar' class='btn btn-link'>";
                    echo "</td>";
                    echo "</form>";
                    echo "</tr>";
                    $indice++;
                }
                ?>

                </tbody>
            </table>

            <form class="form-horizontal pull-right" action="servico_" method="POST">
                <div class="form-group">
                    <button type="submit" name='novoServico' class="btn btn-primary">Novo Serviço</button>
                </div>
            </form>

        </div>
    </div>
    <br />

<?php $imprimeMensagem(); ?>