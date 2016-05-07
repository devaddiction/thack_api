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
        $this->app['web.controller'] = $this->app->share(function () {
            return new Controllers\WebController($this->app['twig']);
        });
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
        $api = $web = $this->app["controllers_factory"];

        $web->get('/', "web.controller:home");
        $api->get('/cities', "cities.controller:getAll");
        $api->get('/events/city/{id}', "events.controller:getByCity");
        $api->get('/events/city/{id}', "events.controller:getByCity");
        $api->post('/hotels/around', "hotels.controller:getByCoordinates");

        $this->app->mount($this->app["api.endpoint"] . '/' . $this->app["api.version"], $api);
        $this->app->mount('/', $web);
    }
}

