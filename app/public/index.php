<?php
// Necessary requires to get things going
$dir = dirname(__DIR__);
$appDir = $dir . '/src';
$configPath = $appDir . '/../config/';
require_once $appDir . '/../../vendor/autoload.php';
require_once $appDir . '/../config/autoload_namespaces.php';
spl_autoload_register('autoload_classes', false, true);
// Necessary paths to autoload & config settings
$apiRoutes = $configPath . 'api-routes.php';

try {
    $app = new Application\Micro();

    // Set configuration
    $app->setConfig($configPath);

    // Set Mapi
    $app->setApi();

    // Setup RESTful Routes
    $app->setRoutes($apiRoutes);

    // Setup access content layer
    $app->setupAcl();
    $app->run();
    $app->processResponse();

} catch (\Exception $e) {
    if (method_exists($e, "getHeaderMsg")) {
        $headerMsg = $e->getHeaderMsg();
    } else {
        $headerMsg = "API UNKNOWN EXCEPTION";
    }
    $app->response->setStatusCode($e->getCode(), $headerMsg);
    $app->response->setContent("CODE: " . $e->getCode());
    $app->response->send();
}
