<?php

namespace App;

use Silex\Application;

class RoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
        $this->app['cities.controller'] = $this->app->share(function () {
            return new Controllers\CitiesController($this->app['cities.service']);
        });
        $this->app['events.controller'] = $this->app->share(function () {
            return new Controllers\EventsController($this->app['events.service']);
        });
        $this->app['hotels.controller'] = $this->app->share(function () {
            return new Controllers\HotelsController($this->app['hotels.service']);
        });
    }

    public function bindRoutesToControllers()
    {
        $api = $this->app["controllers_factory"];

        $api->get('/cities', "cities.controller:getAll");
        $api->get('/events/city/{id}', "events.controller:getByCity");

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

