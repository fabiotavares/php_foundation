<?php

function execSQL($sql, $conn)
{
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();
}

try {
    // Parâmetros de conexão com o banco de dados
    require_once('src/functions/parametros.php');

    //------------------------ BANCO DE DADOS -------------------------------
    //conecta ao servidor mysql
    $conn = new \PDO("{$driver}:host={$host}", $dbUser, $dbPass);

    //cria o banco de dados se ainda não existir
    $sql = "CREATE DATABASE IF NOT EXISTS `{$dbName}` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
    execSQL($sql, $conn);

    //conecta ao banco de dados
    $conn = new \PDO("{$driver}:host={$host};dbname={$dbName}", $dbUser, $dbPass);

    //----------------------- USUARIOS --------------------------------
    //crie a tabela USUARIOS se ela ainda não existir
    $sql = "CREATE TABLE `".$dbName."`.`usuarios` (
        `id` int(5) NOT NULL AUTO_INCREMENT,
        `usuario` varchar(45) CHARACTER SET utf8 NOT NULL,
        `senha` varchar(100) CHARACTER SET utf8 NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `usuario_UNIQUE` (`usuario`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    execSQL($sql, $conn);

    //apague qualquer conteúdo existente
    $sql = "TRUNCATE TABLE `".$dbName."`.`usuarios`;";
    execSQL($sql, $conn);

    //inserindo dados na tabela USUARIOS
    $pass = password_hash($userPass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `{$dbName}`.`usuarios` (`id`, `usuario`, `senha`) VALUES (1, '{$userName}', '{$pass}');";
    execSQL($sql, $conn);

    //-------------------- PAGINAS -----------------------------------
    //crie a tabela PAGINAS se ela ainda não existir
    $sql = "CREATE TABLE IF NOT EXISTS `".$dbName."`.`paginas` (
        `id` int(5) NOT NULL AUTO_INCREMENT,
        `nome` varchar(45) CHARACTER SET utf8 NOT NULL,
        `titulo` varchar(100) CHARACTER SET utf8 NOT NULL,
        `conteudo` text CHARACTER SET utf8,
        PRIMARY KEY (`id`),
        UNIQUE KEY `nome_UNIQUE` (`nome`)
        ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    execSQL($sql, $conn);

    //apague qualquer conteúdo existente
    $sql = "TRUNCATE TABLE `".$dbName."`.`paginas`;";
    execSQL($sql, $conn);

    //inserindo dados na tabela PAGINAS
    $sql = "INSERT INTO `".$dbName."`.`paginas` (`id`, `nome`, `titulo`, `conteudo`) VALUES
        (1, 'home', 'Bem vindo ao Site Simples!', '<p>Aqui voc&ecirc; encontrar&aacute; tudo sobre smartphones, desde ofertas dos melhores produtos no mercado, como servi&ccedil;os exclusivos para a sua total tranquilidade, sempre com muita seguran&ccedil;a e profissionalismo.</p><p>Navegue pelas p&aacute;ginas, ou fa&ccedil;a sua pesquisa pelo menu para encontrar o que est&aacute; procurando.</p>'),
        (2, 'empresa', 'Sobre a Empresa', '<p>Site Simples &eacute; uma empresa criada em 2005 e tem por finalidade oferecer os melhores e mais modernos smartphones do mercado, Al&eacute;m disso, oferecemos cursos de manuten&ccedil;&atilde;o e seguros para sua total tranquilidade. Nosso compromisso &eacute; o de melhor lhe atender e para isso estamos sempre atendos &agrave;s suas cr&iacute;ticas e sugest&otilde;es.</p><p>Entre em contato e nos conte como foi sua experi&ecirc;ncia em nosso site.</p><p>Um forte abra&ccedil;o,<br />Equipe Site Simples.</p>'),
        (3, 'produtos', 'Nossos Produtos', ''),
        (4, 'servicos', 'Nossos Serviços', '');";
    execSQL($sql, $conn);

    //---------------------- PRODUTOS ---------------------------------
    //crie a tabela PRODUTOS se ela ainda não existir
    $sql = "CREATE TABLE IF NOT EXISTS `".$dbName."`.`produtos` (
         `id` int(10) NOT NULL AUTO_INCREMENT,
         `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
         `descricao` text COLLATE utf8_unicode_ci NOT NULL,
         PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    execSQL($sql, $conn);

    //apague qualquer conteúdo existente
    $sql = "TRUNCATE TABLE `".$dbName."`.`produtos`;";
    execSQL($sql, $conn);

    //inserindo dados na tabela PRODUTOS
    $sql = "INSERT INTO `".$dbName."`.`produtos` (`id`, `nome`, `descricao`) VALUES
        (1, 'Smartphone Moto G', '<p>Dual Chip Desbloqueado 3G C&acirc;mera 5MP 16GB Android 4.3 R$ 699,00 A Motorola inova mais uma vez e traz toda a comodidade e tecnologia em um aparelho &uacute;nico e com recursos que v&atilde;o al&eacute;m dos smartphones convencionais e fun&ccedil;&otilde;es que n&atilde;o apenas proporcionam praticidade a sua vida.</p><p>Todos esses benef&iacute;cios podem ser vistos no nov&iacute;ssimo Smartphone Moto G Colors Edition que conta com novidades que promete agradar at&eacute; os consumidores mais exigentes. O Moto G possui um design de ponta que conta com tela Full Touch ampla que permite a visualiza&ccedil;&atilde;o de redes sociais e aplicativos que facilitam o uso do aparelho.</p>'),
        (2, 'Smartphone Samsung Galaxy S5', '<p>Android 4.4.2 4G C&acirc;mera 16 MP Mem&oacute;ria Interna 16GB R$ 699,00 A Samsung inova mais uma vez e lan&ccedil;a o Galaxy S5, um dos mais completos e modernos smartphones do mercado.</p><p>Na linha de tecnologia, o Samsung Galaxy revoluciona com sua c&acirc;mera de 16MP e novos recursos que proporcionam muito mais realidade e lindas imagens &agrave;s suas fotos. O S5 vem com processador Quad Core de 2.5 GHz e sistema operacional Android 4.4.2 KitKat para dar muito mais velocidade &agrave;s suas tarefas.</p>');";
    execSQL($sql, $conn);

    //------------------------ SERVICOS -------------------------------
    //crie a tabela SERVICOS se ela ainda não existir
    $sql = "CREATE TABLE IF NOT EXISTS `".$dbName."`.`servicos` (
         `id` int(10) NOT NULL AUTO_INCREMENT,
         `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
         `descricao` text COLLATE utf8_unicode_ci NOT NULL,
         PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    execSQL($sql, $conn);

    //apague qualquer conteúdo existente
    $sql = "TRUNCATE TABLE `".$dbName."`.`servicos`;";
    execSQL($sql, $conn);

    //inserindo dados na tabela SERVICOS
    $sql = "INSERT INTO `".$dbName."`.`servicos` (`id`, `nome`, `descricao`) VALUES
        (1, 'Curso de Manutenção', 'O Site Simples oferece um curso de manutenção de smartphone com o objetivo de capacitar profissionais para manutenção e conserto de celular em geral,  de maneira rápida e objetiva. O aluno aprenderá em sala de aula totalmente equipada com bancadas e todos os equipamentos para serviços relacionados a manutenção de celular e smartphones. Nosso curso INTENSIVO é indicado para alunos de todo Brasil.\n\r\nEntre em contato para saber sobre preços: cursos@sitesimples.com.'),
        (2, 'Seguro Contra Roubos', 'No Brasil, os smartphones representam 54% das vendas de celulares totais e só no 2° trimestre de 2013 cresceu 110%, segundo dados do IDC. Só que, devido a seus valores elevados que podem a chegar a três mil reais, são equipamentos muito visados pelos ladrões, por isso que o Brasil ocupa o 2º lugar no ranking mundial de maior número de smartphones roubados, perdendo apenas para a Índia, segundo pesquisa realizada pela F-Secure.\n\r\nAproximadamente um milhão de celulares são roubados ou furtados por ano, e o número pode ser ainda maior, já que muitas pessoas não registram queixa a polícia, segundo o vice-presidente para América Latina da F-Secure.\n\r\nFazer um Seguro para celular hoje em dia não é mais uma novidade e, sim, uma necessidade.\nEntre em contato para maiores detalhes: seguros@sitesimples.com.');";
    execSQL($sql, $conn);

    echo "\nFixtures executadas com sucesso.\n";

} catch (\PDOException $ex) {
    die("Erro de conexão<br />Código: ".$ex->getCode()."<br />Mensagem: ".$ex->getMessage());
}
