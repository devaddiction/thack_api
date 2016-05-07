<?php

namespace App\Services;

class HotelsService extends BaseService
{
    public function getByCoordinates($checkIn, $checkOut, $latitude, $longitude)
    {
        $url = "https://hacker232:fthriQ0ZWfs@distribution-xml.booking.com/json/getHotelAvailabilityV2?latitude=" .
            $latitude . "&longitude=" . $longitude . "&checkin={$checkIn}&checkout={$checkOut}&room1=A,A&".
            "order_by=distance&rows=10";
        $client = new \GuzzleHttp\Client();

        $result = $client->request('GET', $url);

        if ($result->getStatusCode() == 200) {
            $result = json_decode($result->getBody(), true);
            $ids = array();
            foreach ($result['hotels'] as $k => $res) {
                $ids[] = $res['hotel_id'];
            }

            $url = "https://hacker232:fthriQ0ZWfs@distribution-xml.booking.com/json/bookings.getHotelDescriptionPhotos".
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
