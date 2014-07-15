<?php
try {
    //conecta ao mysql
    $conn = new \PDO('mysql:host=localhost', 'root', 'root');

    //cria o banco de dados 'site_simples' se ele não existir
    $sql = "CREATE DATABASE IF NOT EXISTS `site_simples` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();
    $stmt = null;

    //conecta ao banco de dados 'site_simples'
    $conn = new \PDO('mysql:host=localhost;dbname=site_simples', 'root', 'root');

} catch (\PDOException $e) { //erro=> exibe mensagem e mata a aplicação
    die('Erro código: ' . $e->getCode() . ': ' . $e->getMessage());
}