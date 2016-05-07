<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$app = new Silex\Application();

if ($_SERVER['HTTP_HOST'] == 'local.api.activiti.es') {
    require_once __DIR__ . '/.././resources/config/dev.php';
} else {
    require_once __DIR__ . '/.././resources/config/prod.php';
}
require __DIR__ . '/.././src/app.php';

$app['http_cache']->run();
