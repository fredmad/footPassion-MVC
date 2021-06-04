# [[ FootPassion ]]



## Description

It's a light weight **MVC** implementation in **PHP**.

It was the first step to learn MVC before to use **Symfony**.


## Demo

Live: https://polar-citadel-28520.herokuapp.com/

Source Code: https://github.com/fredmad/football-passion


## Getting Started

Your front controller should be something like this **public/index.php**

```php
<?php

use ludk\Http\Kernel;
use ludk\Http\Request;

require '../vendor/autoload.php';

$kernel = new Kernel();
$request = new Request($_GET, $_POST, $_SERVER, $_COOKIE);
$response = $kernel->handle($request);
$response->send();
```


## Routing

By default, the **Kernel** will try to load the routes from **config/routes.yaml** but you can set another file when creating the Kernel object.
His role is to reroute the **Request** to the right **Controller** and the **right method** of this controller.

Example:

```yaml
homepage:
  path: /
  controller: Controller\HomeController:display

display:
  path: /display
  controller: Controller\HomeController:display

search:
  path: /search
  controller: Controller\HomeController:display

login:
  path: /login
  controller: Controller\AuthController:login

logout:
  path: /logout
  controller: Controller\AuthController:logout

register:
  path: /register
  controller: Controller\AuthController:register
  
post:
  path: /post
  controller: Controller\ContentController:post
```


## Controller

Your controllers have to extends **AbstractController**.
The **methods** take the **Request as parameter** and have to **return a Response**.

```php
<?php

namespace Controller;

use Entity\User;
use Entity\Link;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function Display(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        $linkRepo = $this->getOrm()->getRepository(Link::class);
        
        $links = array();
        if ($request->query->has('search')) {
            $searchElement = $request->query->get('search');
            if (strpos($searchElement, "@") === 0) {
                $userName = substr($searchElement, 1);
                $users = $userRepo->findBy(array("username" => $userName));
                
                if (count($users) == 1) {
                    $links = $linkRepo->findBy(array("userId" => $users[0]->id));
                    }
            } else {
                $links = $linkRepo->findBy(array("title" => '%' . $searchElement . '%'));
            }
        } else {
            $links = $linkRepo->findAll();
        }
        $data = array(
            "links" => $links
        );
        return $this->render('display.php', $data);
    }
}
```


## Model

To make things easier, there is no database here, all the **data come from json files**.
They are **loaded in memory into the user session** so you can add data, delete, update but they will be restored as the original ones when a new session will start.


## What does it look like?

[Home](screenshot_home.png)