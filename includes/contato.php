<?php if(!isset($_POST["submit"])): ?>

<div>
<form class="navbar-form" name="form1" method="post" action="contato">
    <fieldset>
        <legend>Formulário de contato</legend>
        <label>Nome:<br><input name="nome" type="text" id="nome" class="span2"></label>
        <label>Email:<br><input name="email" type="text" id="email" class="span2"></label>
        <label>Assunto:<br><input name="assunto" type="text" id="assunto" class="span2"></label>
        <label>Mensagem:<br><textarea name="mensagem" wrap="VIRTUAL" id="mensagem" class="span2"></textarea></label>
        <label><input type="submit" name="submit" value="Enviar" class="btn"></label>
    </fieldset>
</form>
</div>

<?php else: ?>

    <div>
        <h2>Confirmação de contato</h2>
        <p>Dados enviados com sucesso!</p>
        <p>Abaixo seguem os dados que você enviou:</p>
        <?php
        echo "<b>Nome</b>: ".$_POST["nome"]."<br />";
        echo "<b>Email</b>: ".$_POST["email"]."<br />";
        echo "<b>Assunto</b>: ".$_POST["assunto"]."<br />";
        echo "<b>Mensagem</b>: ".$_POST["mensagem"];
        ?>
    </div>

<?php endif; ?>