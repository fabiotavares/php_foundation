<?php

//Exibe resultado da pesquisa realizada
echo "<div><h4>Resultado da Pesquisa</h4>";
echo "<hr>";

//pesquisando tabela paginas
//--------------------------------------------------------------------------------------------
$sql = "SELECT * FROM paginas WHERE (conteudo LIKE :query) or (titulo LIKE :query)";
$stmt = $conn->prepare($sql);
$query = "%{$_POST['_termo']}%";
$stmt->bindParam("query", $query);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

//imprima resultados encontrados
$totalResultados = count($result);
if ($totalResultados) {
    foreach ($result as $pagina) {
        echo "<a href=\"{$pagina['nome']}\">{$_POST['_termo']} >> " . strtoupper($pagina['nome']) . "</a><br />";
    }
}

//pesquisando tabela produtos
//--------------------------------------------------------------------------------------------
$sql = "SELECT * FROM produtos WHERE (nome LIKE :query) or (descricao LIKE :query)";
$stmt = $conn->prepare($sql);
$stmt->bindParam("query", $query);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

if (count($result)) {
    echo "<a href=produtos>{$_POST['_termo']} >> PRODUTOS</a><br />";
    $totalResultados++;
}

//pesquisando tabela servicos
//--------------------------------------------------------------------------------------------
$sql = "SELECT * FROM servicos WHERE (nome LIKE :query) or (descricao LIKE :query)";
$stmt = $conn->prepare($sql);
$stmt->bindParam("query", $query);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

if (count($result)) {
    echo "<a href=servicos>{$_POST['_termo']} >> SERVIÇOS</a><br />";
    $totalResultados++;
}

if ($totalResultados == 0) {
    echo '<p>O termo pesquisado não foi encontrado.</p>';
}

echo '</div>';

