<?php

namespace App\Services;

class HotelsService extends BaseService
{
    public function getByCoordinates($coordinates)
    {
        $url = "https://app.xapix.io/api/v1/thm16_tech_beatles/city_events?filter[city_id]={$id}".
            "&fields[city_events]=city_id,url,longitude,latitude,reviews_avg,reviews_number,discount,".
            "net_price_0_formatted_value,net_price_0_value,net_price_0_currency,retail_price_0_formatted_value,".
            "retail_price_0_value,retail_price_0_currency,cover_image_url,is_available_tomorrow,is_available_today,".
            "daily,exclusive,ticket_not_included,open,duration,about,description,temporary,top_seller,last_chance,".
            "must_see,max_confirmation_time,relevance,title,saves,city_0_url,city_0_cover_image_url,city_1_name,".
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
}
