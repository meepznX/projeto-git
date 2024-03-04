<?php 
require_once __DIR__ . "/../app/autoloader.php";

$userService= new UserService;
$userService->logout();

echo <<< HTMLA

<script>
    alert('Logout efetuado com sucesso');
    window.location.href= "../index.php";
</script>
HTMLA;

exit;
