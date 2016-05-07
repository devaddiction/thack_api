<?php
$routes[] = array(
    'method' => array('GET'),
    'route' => '/cities',
    'handler' => array(
        "controller" => "CitiesController",
        "action" => "getAction"
    )
);
return $routes;
