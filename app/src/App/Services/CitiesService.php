<?php

namespace App\Services;

class CitiesService extends BaseService
{

    public function getAll()
    {
        $mallorca = array(
            'name' => 'Palma de Mallorca',
            'picture' => 'http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg',
            'city_id' => 1,
            'booking_id' => 1,
            'hotelbeds_id' => 2,
            'musements_id' => 3,
        );
        $mockedCities[] = $mallorca;
        return $mockedCities;
    }
}
