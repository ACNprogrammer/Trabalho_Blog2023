<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog do Tafareu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Blog do Tafareu</h1>
        <div class="row">
            <div class="col-md-8">
                <h2>Listagem de Jogos do Tafareu até 1734:</h2>
                <ul class="list-group">
                    <?php
                    $jogos_tafareu = array(
                        "Jogo 1",
                        "Jogo 2",
                        "Jogo 3",
                    );

                    foreach ($jogos_tafareu as $jogo) {
                        echo '<li class="list-group-item">' . $jogo . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <div class="container">
        <h1 class="mt-3">Lista de Posts</h1>
        <?php
        // Restante do código PHP da segunda página
        ?>
    </div>
    
    <script>
        // Seu código JavaScript da segunda página
    </script>
</body>
</html>
