<?php

namespace App\Services;

class CitiesService extends BaseService
{

    public function getAll()
    {
        $mockedCities = array(
            array(
                'name' => 'Palma de Mallorca',
                'picture' => 'http://api.activiti.es/images/thumbs/palma.png',
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
        );

        return $mockedCities;
    }
}
