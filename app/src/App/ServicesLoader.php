<?php

namespace App;

use Silex\Application;

class ServicesLoader
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function bindServicesIntoContainer()
    {
        $this->app['cities.service'] = $this->app->share(function () {
            return new Services\CitiesService();
        });
        $this->app['events.service'] = $this->app->share(function () {
            return new Services\EventsService();
        });
        $this->app['hotels.service'] = $this->app->share(function () {
            return new Services\HotelsService();
        });
    }
}

