<div class="row">
    
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tbody>
                <?php
                $contatosDao= new ContatosDAO;

                if (isset($_GET['search'])) {
                    $contatos= $contatosDao->buscarTodosPorPesquisa($_GET['search']);
                } else {
                    $contatos= $contatosDao->buscarTodos();
                }

                foreach($contatos as $contato) {
                    $nome=utf8_encode($contato['nome']);
                    echo "
                    <tr>
                        <td>{$nome}</td>
                        <td>{$contato['email']}</td>
                        <td>{$contato['telefone']}</td>
                        <td>
                            <a class=\"btn btn-link\" href=\"actions/apagar.php?id={$contato['id']}\">Apagar</a>
                            <a class=\"btn btn-link\" href=\"detalhes.php?id={$contato['id']}\">Ver Detalhes</a>
                        </td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div> 