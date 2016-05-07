<?php

namespace App\Services;

use Symfony\Component\Yaml\Tests\A;

class HotelsService extends BaseService
{
    public function getByCoordinate($coordinate, $checkIn, $checkOut)
    {
        $url = "https://hacker232:fthriQ0ZWfs@distribution-xml.booking.com/json/getHotelAvailabilityV2?latitude=".
            $coordinate[0]."&longitude=".$coordinate[1]."&checkin={$checkIn}&checkout={$checkOut}&room1=A,A&order_by=distance";
        $client = new \GuzzleHttp\Client();

        $result = $client->request('GET', $url);

        if ($result->getStatusCode() == 200) {
            $result =  json_decode($result->getBody(), true);
            $ids = array();
            foreach($result['hotels'] as $k=>$res){
                $ids[]=$res['hotel_id'];
            }

            $url = "https://hacker232:fthriQ0ZWfs@distribution-xml.booking.com/json/bookings.getHotelDescriptionPhotos?hotel_ids=".implode(',',$ids);
            $pics = $client->request('GET', $url);
            $pics = json_decode($pics->getBody(), true);

            $hotel_pictures = array();
            foreach($pics as $pic){
                $hotel_pictures['hotel_id'] = $pic;
            }

            foreach($result['hotels'] as $k=>$res){
                $result['hotels'][$k]['pictures']=$hotel_pictures[$res['hotel_id']];
            }
            return $result;

        }

        return false;
    }
}
