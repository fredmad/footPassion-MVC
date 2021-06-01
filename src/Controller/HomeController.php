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