<?php
session_start();

autorizaAcesso();
atualizaSessao();

$imprimeMensagem = function () {
    if (isset($_SESSION["mensagem"])) {
        echo $_SESSION["mensagem"];
        unset($_SESSION["mensagem"]);
    }
};

?>

<div class="container">
    <div class="row">
        <div class="page-header"><h4>Área Restrita</h4></div>
        <h6>Escolha uma página para administrar:</h6>
        <div class="col-sm-offset-3 col-sm-6">
            <table class="table table-bordered table-hover" style="width: 30%">
                <thead>
                <tr style="background: #F5F5F5">
                    <th>#</th>
                    <th>Página</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td><a href="home_">Home</a><br/></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><a href="empresa_">Empresa</a><br/></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><a href="produtos_">Produtos</a><br/></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><a href="servicos_">Serviços</a><br/></td>
                </tr>
                </tbody>
            </table>
        </div>
        <br/>
        <?php $imprimeMensagem(); ?>
    </div>
    <div class="col-sm-offset-3 col-sm-6">
        <form class="form-horizontal pull-right" action="/logout" method="POST">
            <div class="form-group">
                <button type="submit" name='logout' class="btn btn-primary">Sair ( logout )</button>
            </div>
        </form>
    </div>
</div>
