<?php
//session_start();

//retorna true se o usuário estiver logado, false caso contrário
function isLogado()
{
    return (isset($_SESSION["logado"]) && ($_SESSION["logado"] == 1));
}

//retorna true se a sessão do usuário está válida, false se já expirou ou não existe
function sessaoAtiva()
{
    if (isset($_SESSION['ultimoAcesso']) && !empty($_SESSION['ultimoAcesso'])) {
        $tempoAtual = time();
        if (($tempoAtual - $_SESSION['ultimoAcesso']) > SESSAO_INATIVA) {
            unset($_SESSION["logado"]);
            $_SESSION["erroLogin"] = "Sessão expirada por inatividade!";
            return false; //sessão expirada
        } else {
            return true; //sessão ainda válida
        }
    } else {
        return false;
    }
}

//se o usuário não está logado ou sua sessão expirou, redirecione para tela de login
function autorizaAcesso()
{
    if (!isLogado() || !sessaoAtiva()) {
        header('Location: /login');
        die();
    }
}

//atualiza o tempo de acesso da sessão
function atualizaSessao () {
    //atualiza último acesso
    $_SESSION['ultimoAcesso'] = time();
}