<?php
$pagina = getPaginaSolicitada();
?>
<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li <?php if($pagina == "home") echo "class='active'"; ?>>
                <a href="home">Home</a></li>
            <li <?php if($pagina == "empresa") echo "class='active'"; ?>>
                <a href="empresa">Empresa</a></li>
            <li <?php if($pagina == "produtos") echo "class='active'"; ?>>
                <a href="produtos">Produtos</a></li>
            <li <?php if($pagina == "servicos") echo "class='active'"; ?>>
                <a href="servicos">Serviços</a></li>
            <li <?php if($pagina == "contato") echo "class='active'"; ?>>
                <a href="contato">Contato</a></li>
        </ul>
        <form action="/" method="POST" class="navbar-form navbar-right" role="searchForm">
            <input type="text" name="_termo" class="form-control" placeholder="Pesquisar..." />
            <input type="hidden" name="_pesquisa" value="1" />
            <button type="submit" class="btn btn-default">Enviar</button>
        </form>
    </div>
</div>