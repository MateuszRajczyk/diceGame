<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Home extends AbstractController
{
    #[Route('/')]

    public function homepage()
    {
        return $this->render('/Home/index.html', ['home' => 'title']);
    }

    #[Route('/new-game')]

    public function newGame()
    {
        return $this->render('/NewGame/newGame.html');
        
    }

    #[Route('/results')]

    public function results()
    {
        return $this->render('/Results/allResults.html');
    }
}