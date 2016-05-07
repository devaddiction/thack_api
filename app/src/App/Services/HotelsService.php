<?php

namespace App\Services;

class HotelsService extends BaseService
{
    public function getByCoordinates($coordinates)
    {
        $url = "https://hacker232:fthriQ0ZWfs@distribution-xml.booking.com/json/getHotelAvailabilityV2?latitude=40.415258152971&longitude=-3.7148935609517&checkin=2016-07-01&checkout=2016-07-02&room1=A,A";
        $client = new \GuzzleHttp\Client();

        $result = $client->request('GET', $url);

        if ($result->getStatusCode() == 200) {
            return json_decode($result->getBody(), true);
        }
        return false;
    }
}
