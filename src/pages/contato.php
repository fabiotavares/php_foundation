<?php
//Exibir o resultado do formulário
if (isset($_POST["_contato"]) && $_POST["_contato"] == 1):
    ?>

    <div>
        <h3>Confirmação de contato</h3>
        <p>Dados enviados com sucesso:</p>
        <p><b>* Nome</b>: <?php echo $_POST['nome']; ?></p>
        <p><b>* Email</b>: <?php echo $_POST['email']; ?></p>
        <p><b>* Assunto</b>: <?php echo $_POST['assunto']; ?></p>
        <p><b>* Mensagem</b>: <?php echo $_POST['mensagem']; ?></p>
    </div>

<?php
else: //Exibir o formulário

?>

    <div>
        <form class="navbar-form" role="searchForm" name="form1" method="post" action="/contato">
            <fieldset>
                <legend>Formulário de contato</legend>
                <label>Nome:<br/><input name="nome" type="text" id="nome" class="span3" required="true"></label>
                <label>Email:<br/><input name="email" type="text" id="email" class="span3" required="true"></label>
                <label>Assunto:<br/><input name="assunto" type="text" id="assunto" class="span3" required="true"></label>
                <label>Mensagem:<br/><textarea name="mensagem" wrap="VIRTUAL" id="mensagem"
                                               class="span3" rows="3" required="true"></textarea></label>
                <input type="hidden" name="_contato" value="1"/>
                <input type="submit" name="submit" value="Enviar" class="btn">
            </fieldset>
        </form>
    </div>

<?php
endif;
?>