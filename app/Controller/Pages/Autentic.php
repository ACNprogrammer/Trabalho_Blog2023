<?php

namespace App\Controller\Pages;
require_once __DIR__ . '/../../Config/config.php';
require __DIR__ . '/../../../vendor/autoload.php';
use \App\Utils\View;
use \App\Config\Conexao;
use Firebase\JWT\JWT;

class Autenticacao
{

    public function inscribleUser($nome, $email, $senha, $confirmarSenha)
    {
        
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $conexao = new Conexao;
        $conectado = $conexao->conectarBancoDeDados();

        $sql = "INSERT INTO usuarios (NomeUsuario, Email, Senha) VALUES (?, ?, ?)";
        $stmt = $conectado->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senhaHash);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function Login($email, $senha)
    {
        $conexao = new Conexao;
        $conectado = $conexao->conectarBancoDeDados();

        $sql = "SELECT * FROM usuarios WHERE BINARY email = ?";
        $stmt = $conectado->prepare($sql);
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $senhaHash = $row['Senha'];

            
            if (password_verify($senha, $senhaHash)) {
                $payload = array(
                    "id" => $row['Id'],
                    "email" => $row['Email'],
                    "nome" => $row['Nome'],
                    "nivel" => $row['Nivel'],
                );
                $chaveSecreta = 'sua_chave_secreta';
                $token = JWT::encode($payload, $chaveSecreta, 'HS256');

                setcookie('token', $token, time() + 3600, '/');

                header("Location: ../../View/pages/page.php");

                return true;

            }
        }
        return false;
    }
    public function Logout()
    {
        if (isset($_COOKIE['token'])) {
            unset($_COOKIE['token']);
            setcookie('token', null, -1, '/');
        }
        header("Location: ../../View/pages/Login.php");
    }
}

