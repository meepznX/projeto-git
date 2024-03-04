<?php require_once __DIR__ . "/app/autoloader.php"; ?>

<?php include __DIR__ . "/extra/header.php" ?>

<main class="container">
    <div class="pt-5 row justify-content-center">

    <div class="col-9 col-sm-6 col-md-4 col-lg-3">

    <img src="ASSETS/images/logofooter.png" class="img-fluid my-2">
    <h3>Entre com suas credenciais:</h3>

    <p class="alert alert-info alert-dismissible fade show">
        Usuário: <br>
        <strong>versatil@versatil.com.br</strong>
        <br>
        Senha:<br>
        <strong>admin2022</strong>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </p>

    <form method="POST" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="usuario">Usuário:</label>
            <input type="email" name="usuario" required class="form-control">
            <div class="invalid-feedback">Seu usuário deve ser um e-mail válido</div>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" required class="form-control" minlength="8">
            <div class="invalid feedback">Sua senha deve possuir ao menos 8 dígitos</div>
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-3">
            Acessar a conta
        </button>
    </form>

    <?php
    $user= new UserService;

    if(isset($_POST['usuario']) and isset($_POST['senha'])) {
        $res= $user->login($_POST['usuario'], $_POST['senha']);
        switch ((bool) $res) {
            case true:
                echo '<script>
                    alert("Acesso autorizado pelo sistema. ");
                    window.location.href= "home.php";
                    </script>';
                    exit;
                    break;
                default:
                    echo '<p class="alert alert-danger">Usuário e/ou senha inválidos</p>';
            }
        }
        ?>
    </div>
    </div>
</main>

<?php include __DIR__ . "/extra/footer.php" ?>