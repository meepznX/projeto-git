<?php
$contatoDao=new ContatosDAO;
if (isset($_GET['id'])) {
    $c=$contatoDao->buscarPorid($_GET['id']);
} else {
    var_dump($_GET);
    die("Esqueceu de pasar o ID.");
    exit;
}
?>
<form method="POST" action="actions/salvar.php">
    <input type="hidden" name="id" value="<?=$c['id'] ?>"/>
    <div class="row-mb-3">
        <div class="col-md-4">
            <label for="nome">Nome:</label>
            <input type="text" require class="form-control" id="nome" name="nome" value="<?=$c['nome']?>">
        </div>
        <div class="col-md-2">
            <label for="telefone">Telefone:</label>
            <input type="tel" require class="form-control" id="telefone" name="telefone"
            value="<?=$c['telefone']?>">
</div>
    <div class="col-md-6">
        <label for="email">Email:</label>
        <input type="email" require class="form-control" id="email" name="email"
        value="<?=$c['email'] ?>">
</div>
        <div class="row  mb-3">
            <p class="form-label">Capital onde pretende trabalhar:</p>

<?php
$capitalDao=new CapitalDAO;
foreach ($capitalDao->buscarTodos() as $capital) {
    $descricao=utf8_encode($capital['descricao']);
    echo "<div class=\"form-check mb-2\">";

    if($capital['id']==$c['capital_id']) {
    echo "<input checked class=\"form-check-input\" type=\"radio\" name=\"capital_id\"id=\"radioCapital-{$capital['id']}\">";
    } else {
        echo "<input class=\"form-check-input\" type=\"radio\" name=\"capital_id\"id=\"radioCapital-{$capital['id']}\">";
    }
    echo "
    <label class=\"form-check-label\" for=\"radioCapital-{$capital['id']}\">
        {$descricao} 
        </label>
        </div>";
}
?>
</div>
    <div class="col-md-6">
        <div class="mb-2">
            <label for="cargo">
                Cargo Pretendido:
            </label>
            <select name="cargo_id" class="form-control" id="cargo">
                <?php
                $cargoDao=new CargoDAO;
                foreach($cargoDao->buscarTodos()as $cargo) {
                    $descricao=utf8_encode($cargo['descricao']);

                    if ($cargo['id']==$c['cargo_id']) {
                        echo "<option value=\{$cargo['id']}\" selected> {descricao} </option>";
                    } else {
                        echo "option value=\"{$cargo['id']}\ {$descricao} </option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
            </div>

    <div class="row mb-3">
        <div class="col-12">
            <div class="form-group">
                <label for="comentario">Comentários</label>
                <textarea class="form-control" name="comentario" id="comentario" rows="3"><?=$c["comentario"]?></textarea>
            </div>
        </div>
    </div>
    <div class="row justify-content-end mb-4">
        <div class="col-3">
            <button type="submit" class="btn btn-primary float-right">
                Salvar 
            </button>
        </div>
    </div>
            </form>