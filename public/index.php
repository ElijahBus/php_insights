<?php

global $routes;

use server\app\Application;
use server\app\Router;

require_once '../vendor/autoload.php';

require_once '../server/app/Application.php';
require_once '../server/routes.php';
require_once '../server/app/Controller.php';
require_once '../server/app/Router.php';
require_once '../server/phone-book/Service.php';

$app = Application::init();

$db = $app->getDbConnection();

(new Router($routes, $db))->resolve();


// Start the server : php -S 127.0.0.1:8000 -t public
// Start the client : cd client && npm run dev
