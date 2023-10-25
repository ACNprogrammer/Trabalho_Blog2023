<?php

namespace App\Controller\Pages;

require_once __DIR__ . '/../../Config/config.php';
require __DIR__ . '/../../../vendor/autoload.php';

use \App\Utils\View;
use \App\Config\Conexao;

class Tool
{
    public static function CadastrarVisitante($nome, $descricao, $id_visitante)
    {
        $conexao = new Conexao;
        $conectado = $conexao->conectarBancoDeDados();
        
        $sql = "INSERT INTO servicos (Nome, Descricao, id_visitante) VALUES (?, ?, ?)";
        $stmt = $conectado->prepare($sql);
        $stmt->bind_param("ssi", $nome, $descricao, $id_visitante);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
    public static function ConsultarBlogAtivo($id_prestador)
    {
        $conexao = new Conexao;
        $conectado = $conexao->conectarBancoDeDados();
        $sql = "SELECT * FROM servicos WHERE prestador_id = $id_prestador";
        $result = $conectado->query($sql);
        return $result;
    }
    
}
