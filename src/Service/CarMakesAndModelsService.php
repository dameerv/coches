<?php

namespace App\Service;

use App\Entity\Make;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CarMakesAndModelsService
{
    //TODO: найти сервис получше для получения данных автомобилей.
    private string $url;
    #[NoReturn]
    public function __construct(
        private string $apiKey,
        string $url,
        private HttpClientInterface $httpClient,
        private EntityManagerInterface $entityManager)
    {
        $this->url = $url . $this->apiKey;
        dd($this->url);
    }

    public function getAllMakes()
    {
        $repo = $this->entityManager->getRepository(Make::class);
        return $repo->findAll();
    }

    public function getMakeData($makeName)
    {
        $this->httpClient->request();
    }

}