<?php
//Template para as páginas Home, Empresa, Produtos e Serviços
$sql = "SELECT titulo, conteudo FROM paginas WHERE nome = :pagina";
$stmt = $conn->prepare($sql);
$stmt->bindParam("pagina", $paginaSolicitada);
$stmt->execute();
$result = $stmt->fetch(\PDO::FETCH_ASSOC);
$titulo = $result['titulo'];
$conteudo = nl2br($result["conteudo"]);

//exibe conteúdo
echo '<div>';
echo "<h4>{$titulo}</h4>";
echo "<p>{$conteudo}</p>";
echo '</div>';