<nav class="navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <p class="navbar-brand">
            <img src="ASSETS/images/logofooter.png"/>
        </p>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div id="navbarContent" class="collapse navbar-collapse">
        <form class="d-flex m-auto mb-2" method="GET" action="home.php#listar">
            <input class="form-control mr-2" type="search" placeholder="Pesquisar por..." name="search">
            <button class="btn btn-sucesss" type="submit">
                <i class="bi-search"></i>
            </button>
        </form>

        <ul class="navbar-nav nav mb-2">

        <li class="nav-item">
            <a class="nav-link" href="home.php">
                <i class="bi bi-house-door-fill"></i>
                Início 
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="cadastro.php#novo">
                <i class="bi bi-person"></i>
                Cadastrar
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="actions/logout.php">
                <i clas="bi bi-box-arrow-left"></i>
            </a>
        </li>
        </ul>
    </div>
    </div>
</nav>