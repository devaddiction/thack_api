<?php

namespace App\Services;

use DateTime;
use hotelbeds\hotel_api_sdk\HotelApiClient;
use hotelbeds\hotel_api_sdk\model\Destination;
use hotelbeds\hotel_api_sdk\model\Occupancy;
use hotelbeds\hotel_api_sdk\model\Pax;
use hotelbeds\hotel_api_sdk\model\Stay;
use hotelbeds\hotel_api_sdk\types\ApiVersion;
use hotelbeds\hotel_api_sdk\types\ApiVersions;

class HotelsService extends BaseService
{
    public function getByCoordinates($checkIn, $checkOut, $latitude, $longitude)
    {
        return $this->getBookingByCoordinates($checkIn, $checkOut, $latitude, $longitude);
        return array(
            'hotelbeds' => $this->getHotelBedsByCoordinates($checkIn, $checkOut, $latitude, $longitude),
            'booking' => $this->getBookingByCoordinates($checkIn, $checkOut, $latitude, $longitude),
        );
    }

    protected function getHotelBedsByCoordinates($checkIn, $checkOut, $latitude, $longitude)
    {

        $cfgApi = array(
            'url' => 'https://api.test.hotelbeds.com',
            'apiKey' => "t3gv6hdbhs23xtsem4p2auan",
            'sharedSecret' => 'tFjZCmhCVh',
            'timeout' => 120
        );

        $apiClient = new HotelApiClient($cfgApi["url"],
            $cfgApi["apiKey"],
            $cfgApi["sharedSecret"],
            new ApiVersion(ApiVersions::V1_0),
            $cfgApi["timeout"]);

        $rqData = new \hotelbeds\hotel_api_sdk\helpers\Availability();
        $rqData->stay = new Stay(DateTime::createFromFormat("Y-m-d", "2016-07-01"),
            DateTime::createFromFormat("Y-m-d", "2016-07-10"));

        $rqData->destination = new Destination("PMI");
        $occupancy = new Occupancy();
        $occupancy->adults = 2;
        $occupancy->children = 1;
        $occupancy->rooms = 1;

        $occupancy->paxes = [new Pax(Pax::AD, 30, "Mike", "Doe"), new Pax(Pax::AD, 27, "Jane", "Doe"), new Pax(Pax::CH, 8, "Mack", "Doe")];
        $rqData->occupancies = [$occupancy];

        $availRS = $apiClient->Availability($rqData);
        $result = $availRS->hotels->toArray();
        print_r($result);
        die;

//        return json_decode($response->getBody());

    }

    protected function getBookingByCoordinates($checkIn, $checkOut, $latitude, $longitude)
    {
        $url = "https://hacker232:fthriQ0ZWfs@distribution-xml.booking.com/json/getHotelAvailabilityV2?latitude=" .
            $latitude . "&longitude=" . $longitude . "&checkin={$checkIn}&checkout={$checkOut}&room1=A,A&" .
            "order_by=distance&rows=10";
        $client = new \GuzzleHttp\Client();

        $result = $client->request('GET', $url);

        if ($result->getStatusCode() == 200) {
            $result = json_decode($result->getBody(), true);
            $ids = array();
            foreach ($result['hotels'] as $k => $res) {
                $ids[] = $res['hotel_id'];
            }

            $url = "https://hacker232:fthriQ0ZWfs@distribution-xml.booking.com/json/bookings.getHotelDescriptionPhotos" .
                "?hotel_ids=" . implode(',', $ids);
            $pics = $client->request('GET', $url);
            $pics = json_decode($pics->getBody(), true);

            $hotel_pictures = array();
            foreach ($pics as $pic) {
                $hotel_pictures['hotel_id'] = $pic;
            }

            foreach ($result['hotels'] as $k => $res) {
                $result['hotels'][$k]['pictures'] = $hotel_pictures;
            }
            return $result;
        }
        return false;
    }
}
