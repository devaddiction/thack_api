<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CitiesController
{

    protected $citiesService;

    public function __construct($service)
    {
        $this->citiesService = $service;
    }

    public function getAll()
    {
        return new JsonResponse($this->citiesService->getAll());
    }
}
