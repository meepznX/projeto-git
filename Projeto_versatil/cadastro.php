<?php require_once __DIR__ . "/app/autoloader.php"; ?>

<?php UserService::proibirNaoLogado(); ?>
<?php include __DIR__ . "/extra/header.php" ?>
<?php include __DIR__ . "/extra/menu.php" ?>

<main class="container" data-spy="scroll" data-target="#navbarContent" data-offset="0">
    <fieldset id="novo" class="bg-light p-3">
        <legend>Cadastrar um novo Contato</legend>
        <?php include __DIR__ . "/extra/formularioContato.php" ?>
    </fieldset>
</main>

<?php include __DIR__ . "/extra/footer.php" ?>
