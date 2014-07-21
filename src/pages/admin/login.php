<?php
session_start();

//verifica as possibilidades
if (isLogado() && sessaoAtiva()) { //1) usuário já logado e com sessão válida
    header('Location: /admin'); //redireciona para página admin
} elseif (isset($_REQUEST["_login"]) && $_REQUEST["_login"] == '1') { //2) Usuário já digitou dados de login
    //valida dados digitados
    //consulta banco de dados para checar usuário e senha digitados
    $sql = "SELECT senha FROM usuarios WHERE usuario = :usuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("usuario", $_REQUEST["usuario"]);
    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    //confirma se digitou a senha correta
    if (isset($result["senha"]) and password_verify($_REQUEST["senha"], $result["senha"])) {
        //acesso liberado
        $_SESSION["logado"] = "1"; //define o usuário como logado
        atualizaSessao (); //controle de sessão por inatividade
        header('Location: /admin'); //redireciona para página admin
    } else {
        //os dados digitados estão incorretos
        $_SESSION["erroLogin"] = "Usuário ou senha incorretos!";
        header('Location: /login'); //redireciona para página login com mensagem de erro
    }

} else { //3) Apresenta tela de login

?>

<div>
    <form class="navbar-form" role="searchForm" name="form1" method="post" action="login">
        <fieldset>
            <legend>Faça o login abaixo</legend>
            <label>Usuário:<br/><input name="usuario" type="text" id="usuario" class="span2" required="true"></label>
            <label>Senha:<br/><input name="senha" type="password" id="senha" class="span2" required="true"></label>
            <input type="hidden" name="_login" value="1"/>
            <input type="submit" id="acao" name="acao" value="Logar" class="btn">
        </fieldset>
        <?php if (isset($_SESSION["erroLogin"])) {
            echo "<br /><div class='alert alert-error'>{$_SESSION["erroLogin"]}</div>";
            unset($_SESSION["erroLogin"]);
        } ?>
    </form>
</div>

<?php
}
?>
