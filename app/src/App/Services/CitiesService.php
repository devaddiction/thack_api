<?php

namespace App\Services;

class CitiesService extends BaseService
{

    public function getAll()
    {
        $mockedCities = array(
            array(
                'name' => 'Palma de Mallorca',
                'picture' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'thumbnail' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'city_id' => 1,
                'booking_id' => -345224,
                'hotelbeds_id' => 0,
                'musements_id' => 216,
            ),
            array(
                'name' => 'Barcelona',
                'picture' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'thumbnail' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'city_id' => 2,
                'booking_id' => -372490,
                'hotelbeds_id' => 0,
                'musements_id' => 60,
            ),
            array(
                'name' => 'Berlin',
                'picture' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'thumbnail' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'city_id' => 3,
                'booking_id' => -1746443,
                'hotelbeds_id' => 0,
                'musements_id' => 52,
            ),
            array(
                'name' => 'London',
                'picture' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'thumbnail' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'city_id' => 4,
                'booking_id' => -2601889,
                'hotelbeds_id' => 0,
                'musements_id' => 56,
            ),
            array(
                'name' => 'Paris',
                'picture' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'thumbnail' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'city_id' => 5,
                'booking_id' => -1456928,
                'hotelbeds_id' => 0,
                'musements_id' => 40,
            ),
            array(
                'name' => 'Rome',
                'picture' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'thumbnail' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
                'city_id' => 6,
                'booking_id' => -126693,
                'hotelbeds_id' => 0,
                'musements_id' => 2,
            ),
        );

        return $mockedCities;
    }
}
