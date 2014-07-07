<?php
    $pagina = getPaginaSolicitada();
?>
<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="#">Site Simples</a>
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
    </div>
</div>