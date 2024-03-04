<?php
require_once __DIR__ . "/../app/autoloader.php";
UserService::proibirNaoLogado();

$contatoDao=new ContatosDAO;

echo "<pre>";
    var_dump($_POST);

echo "</pre>";

try {
    if (isset($_POST['id'])) {
        $contatoDao->atualizarPorId($_POST['id'], $_POST);
    } else {
        $contatoDao->cadastrar($_POST);
    }
    echo' 
    <script>
        alert("Registro salvo com sucesso!");
        window.location.href= "../home.php";
    </script>
    ';
} catch (PDOException $e) {
    die("falha ao salvar registro:" . $e->getMessage());
    exit;
}