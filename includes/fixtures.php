<?php

//tenta conexão com o banco de dados
require_once('includes/conexao.php');

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
  `conteudo` TEXT NOT NULL,
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC)) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->closeCursor();
$stmt = null;

//inserindo dados das páginas
$sql = "INSERT INTO `site_simples`.`paginas` (`id`, `nome`, `conteudo`) VALUES
(1, 'home', '<div>\r\n    <h3>Home</h3>\r\n    <p>Descrição da página Home!!</p>\r\n    <p>Uma compilação com 100 obras, entre autores brasileiros e estrangeiros, escolhidas entre os 10 mil títulos disponíveis no portal Domínio Público. A lista, traz desde livros seminais, formadores da cultural ocidental, como “Arte Poética”, de Aristóteles, até o célebre “Ulisses”, de James Joyce, considerado um dos livros mais influentes do século 20, além de clássicos brasileiros e portugueses. Todo o acervo do portal DP é composto por obras em domínio público ou que tiveram seus direitos de divulgação cedidos pelos detentores legais. No Brasil, os direitos autorais duram setenta anos contados de 1° de janeiro do ano subsequente à morte do autor.<p>Entre os livros escolhidos estão “A Divina Comédia”, de Dante Alighieri; “Don Quixote”, de Miguel de Cervantes;  “Os Lusíadas”, de Luís Vaz de Camões; “A Metamorfose”, de Franz Kafka;  “A Volta ao Mundo em Oitenta Dias”, de Júlio Verne;  “Os Escravos”, de Castro Alves; “Via-Láctea”, de Olavo Bilac; “A Escrava Isaura”, de Bernardo Guimarães; “Poemas”, de Safo; “Uma Estação no Inferno”, de Arthur Rimbaud; “O Homem que Sabia Javanês e Outros Contos”, de Lima Barreto; “Lira dos Vinte Anos”, de Álvares de Azevedo;  “História da Literatura Brasileira”, de José Veríssimo Dias de Matos; “Eu e Outras Poesias”, de Augusto dos Anjos; “A Esfinge Sem Segredo”, de Oscar Wilde; “Schopenhauer”, de Thomas Mann; “O Elixir da Longa Vida”, de Honoré de Balzac; “Cândido”, de Voltaire; “Viagens de Gulliver”, de Jonathan Swift; “Utopia”, de Thomas Morus; “Canção do Exílio”, de  Gonçalves Dias; “A Carne”, de Júlio Ribeiro; “Os Sertões”, de Euclides da Cunha; além das principais obras de William Shakespeare, Fernando Pessoa,  Machado de Assis, Florbela Espanca e Eça de Queirós.   Para fazer o download basta clicar sobre o livro selecionado.</p>\r\n    </div>'),
(2, 'empresa', '<div>\r\n    <h3>Empresa</h3>\r\n    <p>Sobre a empresa Site Simples</p>\r\n    <p>Site simples é uma das principais incorporadoras e construtoras do País. Com 33 anos de existência, a empresa atua nacionalmente e ao longo de sua história já entregou mais de 89 mil unidades. A incorporadora está presente em diversos segmentos do mercado imobiliário, tem 106 empreendimentos em construção e possui em seu portfólio inúmeros sucessos de vendas de imóveis residenciais e comerciais, nos mais variados perfis de renda.</p>\r\n    <p>A empresa entende que sua missão vai além da construção de residências e locais de trabalho. Seu compromisso é com projetos de vida. Com base em valores como inovação, valorização das pessoas e sustentabilidade, a empresa acredita na construção de relacionamentos de longo prazo com colaboradores, clientes, fornecedores, parceiros e acionistas.</p></div>'),
(3, 'produtos', '<div><h3>Produtos disponíveis</h3>\r\n  <h4>Smartphone Moto G Colors Edition</h4>\r\n    <p>Dual Chip Desbloqueado 3G Câmera 5MP 16GB Android 4.3</p>\r\n    <p>Preço: R$ 799,00</p>\r\n    <p>A Motorola inova mais uma vez e traz toda a comodidade e tecnologia em um aparelho único e com recursos que vão além dos smartphones convencionais e funções que não apenas proporcionam praticidade a sua vida. Todos esses benefícios podem ser vistos no novíssimo Smartphone Moto G Colors Edition que conta com novidades que promete agradar até os consumidores mais exigentes. O Moto G possui um design de ponta que conta com tela Full Touch ampla que permite a visualização de redes sociais e aplicativos que facilitam o uso do aparelho.</p>\r\n    <hr>\r\n    <h4>Smartphone Samsung Galaxy S5</h4>\r\n     <p>Desbloqueado Azul Android 4.4.2 4G Câmera 16 MP Memória Interna 16GB</p>\r\n    <p>Preço: R$ 2.399,00</p>\r\n    <p>A Samsung inova mais uma vez e lança o Galaxy S5, um dos mais completos e modernos smartphones do mercado. Na linha de tecnologia, o Samsung Galaxy revoluciona com sua câmera de 16MP e novos recursos que proporcionam muito mais realidade e lindas imagens às suas fotos. O S5 vem com processador Quad Core de 2.5 GHz e sistema operacional Android 4.4.2 KitKat para dar muito mais velocidade às suas tarefas. A Samsung desenvolveu um smart que trará muito mais agilidade à sua vida e que oferece recursos e aplicativos de ultima geração como o S Health 3.0 e o novo item de segurança Finger Scanner, além de três novos dispositivos - o Gear 2, o Gear 2 Neo e o Samsung Gear Fit - há muito mais para explorar e conhecer com o Galaxy S5.</p></div>'),
(4, 'servicos', '<div><h3>Serviços disponíveis</h3>\r\n    <h4>Serviço1</h4>\r\n    <p>Descrição do serviço1!!</p>\r\n    <p>Nome do serviço: COLETOR WEB DO CAFIR</p>\r\n    <p>Descrição: Solicitar, por meio de aplicativo de coleta on line(Coletor web), os atos cadastrais de inscrição, alteração de dados cadastrais, alteração de titularidade por alienação total, cancelamento e reativação de imóvel rural</p>\r\n    <p>Público alvo: pessoa física e pessoa jurídica</p></div>'),
(5, 'contato', '<div><form class=\"navbar-form\" role=\"searchForm\" name=\"form1\" method=\"post\" action=\"/contato\">\r\n    <fieldset><legend>Formulário de contato</legend>\r\n    <label>Nome:<br /><input name=\"nome\" type=\"text\" id=\"nome\" class=\"span2\"></label>\r\n    <label>Email:<br /><input name=\"email\" type=\"text\" id=\"email\" class=\"span2\"></label>\r\n    <label>Assunto:<br /><input name=\"assunto\" type=\"text\" id=\"assunto\" class=\"span2\"></label>\r\n    <label>Mensagem:<br /><textarea name=\"mensagem\" wrap=\"VIRTUAL\" id=\"mensagem\" class=\"span2\"></textarea></label>\r\n    <input type=\"hidden\" name=\"_contato\" value=\"1\" />\r\n    <label><input type=\"submit\" name=\"submit\" value=\"Enviar\" class=\"btn\"></label></fieldset></form></div>');
";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->closeCursor();
$stmt = null;