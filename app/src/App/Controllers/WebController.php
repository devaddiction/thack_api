<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class WebController
{
    protected $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    protected function getCities()
    {
        $url = "http://api.activiti.es/api/v1/cities";
        $client = new \GuzzleHttp\Client();

        $result = $client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);
        return json_decode($result->getBody(), true);
    }

    protected function getEvents($cityId)
    {
        $url = "http://api.activiti.es/api/v1/events/city/" . $cityId;
        $client = new \GuzzleHttp\Client();

        $result = $client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);
        return json_decode($result->getBody(), true);
    }

    public function home()
    {
        return $this->twig->render('index.twig', array('cities' => $this->getCities()));
    }

    public function city($id)
    {
        $cities = $this->getCities();

        $currentCity = array();
        foreach ($cities as $city) {
            if ($city['city_id'] == $id) {
                $currentCity = $city;
                break;
            }
        }
        return $this->twig->render('city.twig', array(
            'events' => $this->getEvents($id),
            'city' => $currentCity,
        ));
    }

    public function hotels(Request $request)
    {
        $coordinates = $request->request->get('coordinates');
        $url = "http://api.activiti.es/api/v1/hotels/around";
        $client = new \GuzzleHttp\Client();

        $result = $client->request('POST', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'json' => array(
                'coordinates' => $request->request->get('coordinates')
            )
        ]);
        $hotels = $result->getBody();

        return $this->twig->render('hotels.twig', array(
            'hotels' => $hotels['hotels'],
        ));
    }
}
