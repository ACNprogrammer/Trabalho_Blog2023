<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $conexao = new mysqli("host", "usuário", "senha", "banco_de_dados");

    if ($conexao->connect_error) {
        die("Conexão ao banco de dados falhou: " . $conexao->connect_error);
    }

    $excluirQuery = "DELETE FROM Publicacoes WHERE ID = ?";
    $stmt = $conexao->prepare($excluirQuery);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "success"; 
    } else {
        echo "error"; 
    }
    $stmt->close();
    $conexao->close();
}
?>
