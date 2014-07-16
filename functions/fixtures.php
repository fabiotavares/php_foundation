<?php

try {
    // Parâmetros de conexão com o banco de dados
    require_once('parametros.php');

    //conecta ao servidor mysql
    $conn = new \PDO("{$driver}:host={$host}", $dbUser, $dbPass);

    //cria o banco de dados se ainda não existir
    $sql = "CREATE DATABASE IF NOT EXISTS `{$dbName}` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();
    $stmt = null;

    //conecta ao banco de dados
    $conn = new \PDO("{$driver}:host={$host};dbname={$dbName}", $dbUser, $dbPass);

    //apague a tabela PAGINAS se ela existir
    $sql = "DROP TABLE IF EXISTS `paginas`;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();
    $stmt = null;

    //criando a tabela PAGINAS
    $sql = "CREATE TABLE IF NOT EXISTS `site_simples`.`paginas` (
            `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            `nome` VARCHAR(45) NOT NULL,
            `titulo` VARCHAR(45) NOT NULL,
            `conteudo` TEXT NOT NULL,
            UNIQUE INDEX `nome_UNIQUE` (`nome` ASC)) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();
    $stmt = null;

    //inserindo dados na tabela criada
    $sql = "INSERT INTO `site_simples`.`paginas` (`id`, `nome`, `titulo`, `conteudo`) VALUES
        (1, 'home', 'Bem vindo ao Site Simples!', 'Uma compilação com 100 obras, entre autores brasileiros e estrangeiros, escolhidas entre os 10 mil títulos disponíveis no portal Domínio Público. A lista, traz desde livros seminais, formadores da cultural ocidental, como “Arte Poética”, de Aristóteles, até o célebre “Ulisses”, de James Joyce, considerado um dos livros mais influentes do século 20, além de clássicos brasileiros e portugueses. Todo o acervo do portal DP é composto por obras em domínio público ou que tiveram seus direitos de divulgação cedidos pelos detentores legais. No Brasil, os direitos autorais duram setenta anos contados de 1° de janeiro do ano subsequente à morte do autor.<p>Entre os livros escolhidos estão “A Divina Comédia”, de Dante Alighieri; “Don Quixote”, de Miguel de Cervantes;  “Os Lusíadas”, de Luís Vaz de Camões; “A Metamorfose”, de Franz Kafka;  “A Volta ao Mundo em Oitenta Dias”, de Júlio Verne;  “Os Escravos”, de Castro Alves; “Via-Láctea”, de Olavo Bilac; “A Escrava Isaura”, de Bernardo Guimarães; “Poemas”, de Safo; “Uma Estação no Inferno”, de Arthur Rimbaud; “O Homem que Sabia Javanês e Outros Contos”, de Lima Barreto; “Lira dos Vinte Anos”, de Álvares de Azevedo;  “História da Literatura Brasileira”, de José Veríssimo Dias de Matos; “Eu e Outras Poesias”, de Augusto dos Anjos; “A Esfinge Sem Segredo”, de Oscar Wilde; “Schopenhauer”, de Thomas Mann; “O Elixir da Longa Vida”, de Honoré de Balzac; “Cândido”, de Voltaire; “Viagens de Gulliver”, de Jonathan Swift; “Utopia”, de Thomas Morus; “Canção do Exílio”, de  Gonçalves Dias; “A Carne”, de Júlio Ribeiro; “Os Sertões”, de Euclides da Cunha; além das principais obras de William Shakespeare, Fernando Pessoa,  Machado de Assis, Florbela Espanca e Eça de Queirós.   Para fazer o download basta clicar sobre o livro selecionado.'),
        (2, 'empresa', 'Sobre a Empresa', 'Site simples é uma das principais incorporadoras e construtoras do País. Com 33 anos de existência, a empresa atua nacionalmente e ao longo de sua história já entregou mais de 89 mil unidades. A incorporadora está presente em diversos segmentos do mercado imobiliário, tem 106 empreendimentos em construção e possui em seu portfólio inúmeros sucessos de vendas de imóveis residenciais e comerciais, nos mais variados perfis de renda.'),
        (3, 'produtos', 'Nossos Produtos', 'Smartphone Moto G\nAqui Dual Chip Desbloqueado 3G Câmera 5MP 16GB Android 4.3\nPreço: R$ 699,00\n\nA Motorola inova mais uma vez e traz toda a comodidade e tecnologia em um aparelho único e com recursos que vão além dos smartphones convencionais e funções que não apenas proporcionam praticidade a sua vida. Todos esses benefícios podem ser vistos no novíssimo Smartphone Moto G Colors Edition que conta com novidades que promete agradar até os consumidores mais exigentes. O Moto G possui um design de ponta que conta com tela Full Touch ampla que permite a visualização de redes sociais e aplicativos que facilitam o uso do aparelho.\r\n\n\nSmartphone Samsung Galaxy S5\nAndroid 4.4.2 4G Câmera 16 MP Memória Interna 16GB\nPreço: R$ 2.399,00\n\nA Samsung inova mais uma vez e lança o Galaxy S5, um dos mais completos e modernos smartphones do mercado. Na linha de tecnologia, o Samsung Galaxy revoluciona com sua câmera de 16MP e novos recursos que proporcionam muito mais realidade e lindas imagens às suas fotos. O S5 vem com processador Quad Core de 2.5 GHz e sistema operacional Android 4.4.2 KitKat para dar muito mais velocidade às suas tarefas.'),
        (4, 'servicos', 'Nossos Serviços', 'Nome do serviço: COLETOR WEB DO CAFIR\n\r\nDescrição: Solicitar, por meio de aplicativo de coleta on line(Coletor web), os atos cadastrais de inscrição, alteração de dados cadastrais, alteração de titularidade por alienação total, cancelamento e reativação de imóvel rural.\n\r\nPúblico alvo: pessoa física e pessoa jurídica.')
        ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();
    $stmt = null;

} catch (\PDOException $ex) {
    die("Erro de conexão<br />Código: ".$ex->getCode()."<br />Mensagem: ".$ex->getMessage());
}

