<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ResultWinner;

class NewGame extends AbstractController
{

    #[Route('/checkWinner')]

    public function checkWinner(ManagerRegistry $doctrine)
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

        $entityManager = $doctrine->getManager();
        $product = new ResultWinner();
        $product->setComputerResult($computer);
        $product->setUserResult($user);
        $product->setWinner($win);
        $product->setDate(date('Y-m-d'));
        $product->setTime(date('H:i:s'));

        $entityManager->persist($product);
        $entityManager->flush();
        
        return new Response(json_encode($winnerArr));
    }

}