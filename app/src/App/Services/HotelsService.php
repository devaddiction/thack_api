<?php

namespace App\Services;

use Symfony\Component\Yaml\Tests\A;

class HotelsService extends BaseService
{
    public function getByCoordinate($coordinate, $checkIn, $checkOut)
    {
        $url = "https://hacker232:fthriQ0ZWfs@distribution-xml.booking.com/json/getHotelAvailabilityV2?latitude=".
            $coordinate[0]."&longitude=".$coordinate[1]."&checkin={$checkIn}&checkout={$checkOut}&room1=A,A";
        $client = new \GuzzleHttp\Client();

        $result = $client->request('GET', $url);

        if ($result->getStatusCode() == 200) {
            return json_decode($result->getBody(), true);
        }
        return false;
    }
}
