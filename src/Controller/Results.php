<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ResultWinner;

class Results extends AbstractController
{
    #[Route('/results')]

    public function show(ManagerRegistry $doctrine): Response
    {
        $winner = $doctrine->getRepository(ResultWinner::class)->findAll();

        $win = array();

        foreach($winner as $winn){
            $win[] = array(
                'user_result' => $winn->getUserResult(), 
                'computer_result' => $winn->getComputerResult(), 
                'winner' => $winn->getWinner(),
                'date_play' => $winn->getDate(),
                'time_play' => $winn->getTime()
            );
        }

        return new Response($this->renderView('/Results/allResults.html', ['winners' => $win]));

    }

}