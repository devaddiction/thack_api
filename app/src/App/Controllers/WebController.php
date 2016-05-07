<?php

namespace App\Controllers;


class WebController
{
    protected $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function home()
    {
        $url = "http://api.activiti.es/api/v1/cities";
        $client = new \GuzzleHttp\Client();

        $result = $client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);
        print_r($result->getBody()); die;
        return $this->twig->render('index.twig', array('cities' => \GuzzleHttp\json_decode($result->getBody(), false)));
    }
}
