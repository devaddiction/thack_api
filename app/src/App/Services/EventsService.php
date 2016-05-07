<?php

namespace App\Services;

class EventsService extends BaseService
{

    protected $cityMap = array(
        1 => array(
            'booking' => -345224,
            'hotelbeds' => 'PMI',
            'musements' => 216,
        ),
        2 => array(
            'booking' => -372490,
            'hotelbeds' => 'BCN',
            'musements' => 60,
        ),
        3 => array(
            'booking' => -1746443,
            'hotelbeds' => 'BER',
            'musements' => 52,
        ),
        4 => array(
            'booking' => -2601889,
            'hotelbeds' => 'LON',
            'musements' => 56,
        ),
        5 => array(
            'booking' => -1456928,
            'hotelbeds' => 'PAR',
            'musements' => 40,
        ),
        6 => array(
            'booking' => -126693,
            'hotelbeds' => 'ROE',
            'musements' => 2,
        ),
    );

    protected function getMusementsCityId($id)
    {
        return $this->cityMap[$id]['musements'];
    }

    protected function getHotelBedsCityId($id)
    {
        return $this->cityMap[$id]['hotelbeds'];
    }

    public function getByCity($id)
    {
        $musements = $this->getMusementsEvents($this->getMusementsCityId($id));
        $activities = array();
        foreach ($musements['city_events'] as $event) {
            if (is_float($event['latitude']) && is_float($event['longitude'])) {
                $activities[] = array(
                    'name' => $event['title'],
                    'latitude' => $event['latitude'],
                    'longitude' => $event['longitude'],
                    'picture' => $event['cover_image_url'],
                    'deeplink' => $event['url'],
                    'price' => $event['net_price_0_formatted_value'],
                    'provider' => 'musement'
                );
            }
        }
        $musements = null;
        unset($musements);
        $hotelbeds = $this->getHotelBedsEvents($this->getHotelBedsCityId($id));
        foreach ($hotelbeds['activities'] as $event) {
            if (is_float($event['content']['location']['startingPoints'][0]['meetingPoint']['geolocation']['latitude']) &&
                is_float($event['content']['location']['startingPoints'][0]['meetingPoint']['geolocation']['longitude'])
            ) {
                $activities[] = array(
                    'name' => $event['name'],
                    'latitude' => $event['content']['location']['startingPoints'][0]['meetingPoint']['geolocation']['latitude'],
                    'longitude' => $event['content']['location']['startingPoints'][0]['meetingPoint']['geolocation']['longitude'],
                    'picture' => $event['content']['media']['images'][0]['urls'][0]['resource'],
                    'deeplink' => $event['url'],
                    'price' => $event['amountsFrom'][0]['amount'] . ' ' . $event['currency'],
                    'provider' => 'hotelbeds'
                );
            }
        }
        return $activities;

    }

    protected function getMusementsEvents($id)
    {
        $url = "https://app.xapix.io/api/v1/thm16_tech_beatles/city_events?filter[city_id]={$id}" .
            "&fields[city_events]=city_id,url,longitude,latitude,reviews_avg,reviews_number,discount," .
            "net_price_0_formatted_value,net_price_0_value,net_price_0_currency,retail_price_0_formatted_value," .
            "retail_price_0_value,retail_price_0_currency,cover_image_url,is_available_tomorrow,is_available_today," .
            "daily,exclusive,ticket_not_included,open,duration,about,description,temporary,top_seller,last_chance," .
            "must_see,max_confirmation_time,relevance,title,saves,city_0_url,city_0_cover_image_url,city_1_name," .
            "city_1_x_id,city_0_name,city_0_x_id,x_id&sort=x_id&page[number]=1&page[size]=1000";
        $client = new \GuzzleHttp\Client();

        $result = $client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization-Token' => 'GAes76CZnkHTPJoBV0rtgz5Y9Fiq2LQI',
            ],
        ]);

        if ($result->getStatusCode() == 200) {
            return json_decode($result->getBody(), true);
        }
        return false;
    }


    public function getHotelBedsEvents($id)
    {
        $apiKey = "k7vwmbh5bauxdsju2yuq9xj2";
        $sharedSecret = "DvzsbFhUHN";

        $signature = hash("sha256", $apiKey . $sharedSecret . time());

        $url = 'https://api.test.hotelbeds.com/activity-api/3.0/activities';
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', $url, [
                'headers' => [
                    "Api-Key" => $apiKey,
                    "X-Signature" => $signature,
                    "Accept" => "application/json",
                    'Content-Type' => 'application/json',
                ],
                'json' => array(
                    'filters' => array(
                        array(
                            'searchFilterItems' => array(
                                array(
                                    'type' => 'destination',
                                    'value' => $id
                                )
                            )
                        )
                    ),
                    'from' => '2016-06-29',
                    'to' => '2016-06-30',
                )
            ]
        );
        return json_decode($response->getBody(), true);
    }
}
