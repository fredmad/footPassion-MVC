<?php

namespace Controller;

use Entity\Link;
use Entity\User;
use ludk\Persistence\ORM;

class HomeController
{
    public function Display()
    {
        $orm = new ORM(__DIR__ . '/../Resources');
        $linkRepo = $orm->getRepository(Link::class);
        $userRepo = $orm->getRepository(User::class);
        
        $links = [];
        if (isset($_GET['search'])) {
            $searchElement = $_GET['search'];
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
        include "../templates/display.php";
    }
}
