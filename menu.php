<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="#">Site Simples</a>
        <ul class="nav">
            <li <?php if((! isset($_GET["page"])) or (isset($_GET["page"]) and $_GET["page"] == "home")) echo "class='active'"; ?>>
                <a href="index.php?page=home">Home</a></li>
            <li <?php if(isset($_GET["page"]) and $_GET["page"] == "empresa") echo "class='active'"; ?>>
                <a href="index.php?page=empresa">Empresa</a></li>
            <li <?php if(isset($_GET["page"]) and $_GET["page"] == "produtos") echo "class='active'"; ?>>
                <a href="index.php?page=produtos">Produtos</a></li>
            <li <?php if(isset($_GET["page"]) and $_GET["page"] == "servicos") echo "class='active'"; ?>>
                <a href="index.php?page=servicos">Serviços</a></li>
            <li <?php if(isset($_GET["page"]) and $_GET["page"] == "contato") echo "class='active'"; ?>>
                <a href="index.php?page=contato">Contato</a></li>
        </ul>
    </div>
</div>