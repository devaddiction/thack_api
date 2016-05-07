<?php

namespace App\Services;

class CitiesService extends BaseService
{

    public function getAll()
    {
        $mockedCities = array(
            array(
                'name' => 'Palma de Mallorca',
                'picture_thumb' => 'http://api.activiti.es/images/thumbs/palma.png',
                'picture_header' => '',
                'short_description' => '',
                'long_description' => '',
                'city_id' => 1,
                'booking_id' => -345224,
                'hotelbeds_id' => 0,
                'musements_id' => 216,
            ),
            array(
                'name' => 'Barcelona',
                'picture_thumb' => 'http://api.activiti.es/images/thumbs/barcelona.png',
                'picture_header' => '',
                'short_description' => '',
                'long_description' => '',
                'city_id' => 2,
                'booking_id' => -372490,
                'hotelbeds_id' => 0,
                'musements_id' => 60,
            ),
            array(
                'name' => 'Berlin',
                'picture_thumb' => 'http://api.activiti.es/images/thumbs/berlin.png',
                'picture_header' => '',
                'short_description' => '',
                'long_description' => '',
                'city_id' => 3,
                'booking_id' => -1746443,
                'hotelbeds_id' => 0,
                'musements_id' => 52,
            ),
            array(
                'name' => 'London',
                'picture_thumb' => 'http://api.activiti.es/images/thumbs/london.png',
                'picture_header' => '',
                'short_description' => '',
                'long_description' => '',
                'city_id' => 4,
                'booking_id' => -2601889,
                'hotelbeds_id' => 0,
                'musements_id' => 56,
            ),
            array(
                'name' => 'Paris',
                'picture_thumb' => 'http://api.activiti.es/images/thumbs/paris.png',
                'picture_header' => '',
                'short_description' => '',
                'long_description' => '',
                'city_id' => 5,
                'booking_id' => -1456928,
                'hotelbeds_id' => 0,
                'musements_id' => 40,
            ),
            array(
                'name' => 'Rome',
                'picture_thumb' => 'http://api.activiti.es/images/thumbs/rome.png',
                'picture_header' => '',
                'short_description' => '',
                'long_description' => '',
                'city_id' => 6,
                'booking_id' => -126693,
                'hotelbeds_id' => 0,
                'musements_id' => 2,
            ),
        );

        return $mockedCities;
    }
}
