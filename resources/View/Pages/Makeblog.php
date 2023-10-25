<?php
require_once '..\..\..\app\Controller\Pages\funções.php';
use \App\Controller\Pages\Tool;
$Servico = new Tool;

if(isset($_POST['nome']))
{
    $nome = $_POST['nome'];
    $resumo = $_POST['resumo'];
    $id_visitante = $decoded->id;

    $retornoCadastro = $Tool->CadastrarVisitante($nome, $valor, $descricao,$id_prestador);

    echo '<div class="d-flex justify-content-center mt-3">';

    if ($retornoCadastro) {
        header('Location: page.php?arquivo=InscribleBlog&id=&success=true');
    }
    
    else
    {
        echo '<div class="alert alert-danger mt-3 w-50">
                <strong>Erro:</strong> Erro.
              </div>';
    }

    echo '</div>';
}

?>

<div class="container mt-5">
        <h1>Quero falar sobre o Tafareu:</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nomeServico" class="form-label">Titulo do comentario para o Tafareu</label>
                <input type="text" class="form-control" id="nomeServico" name="nomeServico" required>
            </div>
            <div class="mb-3">
                <label for="descricaoServico" class="form-label">Resumo</label>
                <textarea class="form-control" id="descricaoServico" name="descricaoServico" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <div class="container p-3">
    <div class="card p-3 table-responsive">
    <h2>Meus Coméntarios dedicados ao jogador Tafareu: </h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Resumo</th>
                    <th>Alternativas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $Servico->ConsultarBlogAtivo($decoded->id);
                

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Nome'] . "</td>";
                        echo "<td>" . $row['Resumo'] . "</td>";
                        echo "<td class='col-auto'>";
                        echo "<a href='DetalhesServico.php?id=" . $row['Id'] . "' class='btn btn-sm btn-info'>Detalhes</a>";
                        echo "<a href='DeletarServico.php?id=" . $row['Id'] . "' class='btn btn-sm btn-danger'>Deletar</a>";
                        echo "</td>";
                        echo "</tr>";
                
                    }
                } else {
                    echo "<tr><td colspan='3'>Nada de comentarios ou posts.</td></tr>";
                }

                ?>
            </tbody>
        </table>

        </div>
        </div>