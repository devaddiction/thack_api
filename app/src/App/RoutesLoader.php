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
        $app = $this->app["controllers_factory"];

        $app->get('/', "web.controller:home");
        $app->get('/city/{id}', "web.controller:city");
        $app->get($this->app["api.endpoint"] . '/' . $this->app["api.version"]. '/cities', "cities.controller:getAll");
        $app->get($this->app["api.endpoint"] . '/' . $this->app["api.version"]. '/events/city/{id}', "events.controller:getByCity");
        $app->get($this->app["api.endpoint"] . '/' . $this->app["api.version"]. '/events/city/{id}', "events.controller:getByCity");
        $app->post($this->app["api.endpoint"] . '/' . $this->app["api.version"]. '/hotels/around', "hotels.controller:getByCoordinates");

        $this->app->mount('', $app);
    }
}

