<?php
$contatoDao=new ContatosDAO;
if (isset($_GET['id'])) {
    $c=$contatoDao->buscarPorId($_GET['id']);
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
            <input type="text" required class="form-control" id="nome" name="nome" value="<?=$c['nome']?>">
        </div>
        <div class="col-md-2">
            <label for="telefone">Telefone:</label>
            <input type="tel" required class="form-control" id="telefone" name="telefone" value="<?=$c['telefone']?>">
</div>
    <div class="col-md-6">
        <label for="email">Email:</label>
        <input type="email" required class="form-control" id="email" name="email" value="<?=$c['email'] ?>">
</div>
</div>
        <div class="row  mb-3">
            <div class="col-md-6">
                <p class="form-label">Capital onde pretende trabalhar:</p>

<?php
$capitalDao=new CapitalDAO;
foreach ($capitalDao->buscarTodos() as $capital) {
    $descricao=utf8_encode($capital['descricao']);
    echo "<div class=\"form-check mb-2\">";

    if($capital['id']==$c['capital_id']) {
    echo "<input checked class=\"form-check-input\" type=\"radio\" name=\"capital_id\"id=\"radioCapital-{$capital['id']}\" value=\"{$capital['id']}\">";
    } else {
        echo "<input class=\"form-check-input\" type=\"radio\" name=\"capital_id\"id=\"radioCapital-{$capital['id']}\"value=\"{$capital['id']}\">";
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
                        echo "<option value=\"{$cargo['id']}\" selected> {$descricao} </option>";
                    } else {
                        echo "option value=\"{$cargo['id']}\" {$descricao} </option>";
                    }
                }
                ?>
            </select>
            </div>
            
            <div class="mb-12">
                <label for="tempoExperiencia">Tempo de Experiência:</label>
                <select name="tempo_experiencia_id" class="form-control" id="tempoExperiencia">
                    <?php
                    $tempoExperienciaDao=new TempoDeExperienciaDAO;
                    foreach($tempoExperienciaDao->buscarTodos() as $te) {
                        $descricao=utf8_encode($te['descricao']);

                        if ($te['id'] == $c['tempo_experiencia_id']) {
                            echo "<option value=\"{$te['id']}\" selected> {$descricao} </option>";
                        } else {
                            echo "<option value=\"{$te['id']}\" {$descricao} </option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="mb-2">
                <label for="areaAtuacao">Área de Atuação:</label>
                <select name="area_atuacao_id" class="form-control" id="araeAtuacao">
                    <?php 
                    $areaDao = new AreaDeAtuacaoDAO;
                    foreach($areaDao->buscarTodos() as $area) {
                        $descricao= utf8_encode($area['descricao']);

                        if ($area['id'] == $c['area_atuacao_id']) {
                            echo "<option value=\"{$area['id']}\"selected> {$descricao} </option>";
                        } else {
                            echo "<option value=\"{$area['id']}\"> {$descricao} </option>";
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