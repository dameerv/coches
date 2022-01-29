<?php

namespace App\Controller;

use App\Service\CurrencyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'test')]
    public function index(CurrencyService $currencyService): Response
    {
        dd($currencyService->getAll());
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
