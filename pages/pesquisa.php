<?php
//Exibe resultado da pesquisa realizada
$sql = "SELECT * FROM paginas WHERE (conteudo LIKE :query) or (titulo LIKE :query)";
$stmt = $conn->prepare($sql);
$stmt->bindParam("query", $query);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

//exibe resultado da pesquisa
echo '<div><h4>Pesquisa</h4>';
if (count($result)) { //encontrou algum resultado
    foreach ($result as $pagina) {
        echo "<a href=\"{$pagina['nome']}\">{$_POST['_termo']} >> " . strtoupper($pagina['nome']) . "</a><br />";
    }
} else { //não encontrou resultado para o termo pesquisado
    echo '<p>O termo pesquisado não foi encontrado.</p>';
}
echo '</div>';