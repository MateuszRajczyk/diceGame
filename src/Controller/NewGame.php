<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewGame extends AbstractController
{

    #[Route('/checkWinner')]

    public function checkWinner()
    {
        $computer = rand(1,6);
        $user = $_POST['userResult'];

        if($computer > $user)
        {
            $win = 'computer';
        }else if($computer < $user){
            $win = 'user';
        }else{
            $win = 'draw';
        }
        
        $winnerArr = array('computer' => $computer, 'user' => $user, 'winner' => $win);

        return new Response(json_encode($winnerArr));
    }
}