<?php

//Template para as páginas Home, Empresa, Produtos e Serviços
$sql = "SELECT titulo, conteudo FROM paginas WHERE nome = :pagina";
$stmt = $conn->prepare($sql);
$pg = getPaginaURI();
$stmt->bindParam("pagina", $pg);
$stmt->execute();
$result = $stmt->fetch(\PDO::FETCH_ASSOC);

$titulo = $result['titulo'];
$conteudo = $result["conteudo"];

//exibe conteúdo
echo '<div>';
echo "<h4>{$titulo}</h4>";

//verifica se a página é de produtos ou servicos
if (($pg == "produtos") || ($pg == "servicos")) {
    //consulta todos os registros da tabela
    $sql = "SELECT * FROM ".$pg;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    //imprima cada registro encontrado
    if (count($result)) {
        foreach ($result as $registro) {
            echo "<hr>";
            echo "<h5>{$registro['nome']}</h5>";
            $descricao = $registro["descricao"];
            echo "<div>{$descricao}</div>";
        }
    }

} else { //coloque conteúdo de paginas
    echo "<hr>";
    echo "<div>{$conteudo}</div>";
}

echo '</div>';