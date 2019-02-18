<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">DEV-1</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if ($viewVar['nameController'] == "HomeController") {?> class="active" <?php
}?>>
                    <a href="/">Home</a>
                </li>
                <li <?php if ($viewVar['nameController'] == "VendasController") {?> class="active" <?php
}?>>
                    <a href="/vendas">Vendas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>