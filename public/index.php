<?php

use Entity\Link;
use Entity\User;
use ludk\Persistence\ORM;
use Controller\AuthController;
use Controller\HomeController;
use Controller\ContentController;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$orm = new ORM(__DIR__ . '/../Resources');
$linkRepo = $orm->getRepository(Link::class);
$userRepo = $orm->getRepository(User::class);

$manager = $orm->getManager();

$action = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1);

switch ($action) {
    case 'register':
        $controller = new AuthController();
        $controller->Register();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->Logout();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->Login();
        break;
    case 'new':
        $controller = new ContentController();
        $controller->Create();
        break;
    case 'display':
    default:
        $controller = new HomeController();
        $controller->Display();
        break;
}

?>