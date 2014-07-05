<h2>Confirmação de contato</h2>
<p>Dados enviados com sucesso!</p>
<p>Abaixo seguem os dados que você enviou:</p>
<?php
    echo "<b>Nome</b>: ".$_POST["nome"]."<br />";
    echo "<b>Email</b>: ".$_POST["email"]."<br />";
    echo "<b>Assunto</b>: ".$_POST["assunto"]."<br />";
    echo "<b>Mensagem</b>: ".$_POST["mensagem"];
?>