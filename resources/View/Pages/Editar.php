<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $titulo = $_POST["titulo"];
        $conteudo = $_POST["conteudo"];

        $conexao = new mysqli("localhost", "seu_usuario", "sua_senha", "seu_banco_de_dados");

        if ($conexao->connect_error) {
            die("Conexão ao banco de dados falhou: " . $conexao->connect_error);
        }

        $atualizarQuery = "UPDATE Publicacoes SET Titulo = ?, Conteudo = ? WHERE ID = ?";
        $stmt = $conexao->prepare($atualizarQuery);
        $stmt->bind_param("ssi", $titulo, $conteudo, $id);

        if ($stmt->execute()) {
            echo "success"; 
        } else {
            echo "error"; 
        }

        $stmt->close();
        $conexao->close();
    } else {
        echo "error: ID não foi fornecido.";
    }
}
?>
