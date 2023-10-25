<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Home extends Page
{
    public static function getHome()
    {
        $content = View::render('pages/Home.php',[
            'name' => 'Tela Home',
            'description' => 'descrição home',
        ]);

        return parent::getPage('Tela Home', $content);
    }

    public static function getHomeG()
    {
        // Array associativo com o número de gols por jogo do Tafareu
        $golsPorJogo = [
            'Jogo 1' => 2,
            'Jogo 2' => 3,
            'Jogo 3' => 1,
        ];

        $content = View::render('pages/Home.php', [
            'name' => 'Tela Home',
            'description' => 'descrição home',
            'golsPorJogo' => $golsPorJogo,
        ]);

        return parent::getPage('Tela Home', $content);
    }
}