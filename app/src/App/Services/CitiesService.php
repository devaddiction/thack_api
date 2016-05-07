<?php

namespace App\Services;

class CitiesService extends BaseService
{

    public function getAll()
    {
        $mockedCities = array(
            array(
                'name' => 'Palma de Majorca',
                'picture_thumb' => 'http://api.activiti.es/images/thumbs/palma.png',
                'picture_header' => '',
                'short_description' => 'A fusion of history and fun',
                'long_description' => 'Palma de Majorca is the capital city of the Balearic Islands in Spain, offering a great mixture of fascinating history, marvellous architecture and vibrant nightlife.',
                'city_id' => 1,
                'booking_id' => -345224,
                'hotelbeds_id' => 0,
                'musements_id' => 216,
            ),
            array(
                'name' => 'Barcelona',
                'picture_thumb' => 'http://api.activiti.es/images/thumbs/barcelona.png',
                'picture_header' => '',
                'short_description' => 'Vibrant and Colourful Barcelona',
                'long_description' => 'Lively and colourful Barcelona faces the Mediterranean Sea and features the world\'s top city beaches, including Sant Sebastià, Barceloneta and Somorrostro beaches. There is plenty to see and experience in this city of great architecture: the historic Gothic Quarter, the amazing modernist design of Gaudi’s creations and the popular Las Ramblas.',
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
