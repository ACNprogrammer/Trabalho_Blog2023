<?php
require_once '..\..\..\app\Controller\Pages\Autenticacao.php';
use \App\Controller\Pages\Autenticacao;
$Autenticacao = new Autenticacao;

$Autenticacao->Logout();
