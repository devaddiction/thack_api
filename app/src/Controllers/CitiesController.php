<?php

namespace Controllers;

use Phalcon\Mvc\Controller;
use Models\Destination;

class CitiesController extends Controller
{
    /**
     * @return array
     * @throws \Exceptions\InvalidArgumentException
     */
    public function getAction()
    {
        $response = '{  
   "result":[  
      {  
         "name":"Palma de Mallorca",
         "picture":"http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg",
         "city_id":1,
         "booking_id":1,
         "hotelbeds_id":2,
         "musements_id":3
      },
      {  
         "name":"Palma de Mallorca",
         "picture":"http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg",
         "city_id":1,
         "booking_id":1,
         "hotelbeds_id":2,
         "musements_id":3
      },
      {  
         "name":"Palma de Mallorca",
         "picture":"http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg",
         "city_id":1,
         "booking_id":1,
         "hotelbeds_id":2,
         "musements_id":3
      },
      {  
         "name":"Palma de Mallorca",
         "picture":"http://www.spain.info/export/sites/spaininfo/comun/carrusel-recursos/baleares/vista-palma-de-mallorca-2183112-istock.jpg_369272544.jpg",
         "city_id":1,
         "booking_id":1,
         "hotelbeds_id":2,
         "musements_id":3
      }
   ]
}';
        return $response;
    }
}
