<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class EventsController
{

    protected $eventsService;

    public function __construct($service)
    {
        $this->eventsService = $service;
    }

    public function getByCity($id)
    {
        return new JsonResponse($this->eventsService->getByCity($id));
    }

}
