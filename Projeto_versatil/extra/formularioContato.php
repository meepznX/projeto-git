<form method="POST" action="actions/salvar.php">
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="nome">Nome:</label>
            <input type="text" required class="form-control" id="nome" name="nome">
        </div>

        <div class="col-md-2">
            <label for="telefone">Telefone:</label>
                <input type="tel" required class="form-control" id="telefone" name="telefone">
        </div>

        <div class="col-md-6">
            <label for="email">Email:</label>
            <input type="email" required class="form-control" id="email" name="email">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <p class="form-label">Capital onde pretende trabalhar:</p>

            <?php 
            $capitalDAO=new CapitalDAO;
            foreach($capitalDao->buscarTodos() as $capital) {
                $descricao=utf8_encode($capital['descricao']);
                echo "
                <div class=\"form-check mb-2\">
                <input class=\"form-check-input\" type=\"radio\" name=\"capital_id\"id=\"radioCapital-{$capital['id']}\"value=\"{$capital['id']}\">
                <label class=\"form-check-label\" for=\"radioCapital-{$capital['id']}\">
                    {$descricao} 
                </label>
                </div>
                ";
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
                        echo "<option value=\"{$cargo['id']}\"> {$descricao} </option>";
                    }
                    ?>
                </select>
            </div>
                
            <div class="mb-2">
                <label for="tempoExperiencia">Tempo de Experiência:</label>
                <select name="tempo_experiencia_id" class="form-control" id="tempoExperiencia">
                    <?php
                    $tempoExperienciaDao=new TempoDeExperienciaDAO;
                    foreach($tempoExperienciaDao->buscarTodos()as $tempo) {
                        $descricao=utf8_encode($tempo['descricao']);
                        echo "<option value=\"{$tempo['id']}\">{$descricao} </option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-2">
                <label for="areaAtuacao">Área de Atuação:</label>
                <select name="area_atuacao_id" class="form-control" id="areaAtuacao">
                    <?php
                    $areaDao=new AreaDeAtuacaoDAO;
                    foreach($areaDao->buscarTodos()as $area) {
                        $descricao=utf8_encode($area['descricao']);
                        echo "<option value=\"{$area['id']}\"> {$descricao} </option>";
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
                    <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
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