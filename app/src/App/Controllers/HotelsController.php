<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class HotelsController
{

    protected $hotelsService;

    public function __construct($service)
    {
        $this->hotelsService = $service;
    }

    public function getByCoordinates(Request $request)
    {
        $coordinates = $request->request->get("coordinates");
        return new JsonResponse($this->hotelsService->getByCoordinates($coordinates));
    }
}
