<?php
$routes[] = array(
    'method' => array('GET'),
    'route' => '/cities',
    'handler' => array(
        "controller" => "CitiesController",
        "action" => "getCitiesAction"
    )
);
return $routes;
