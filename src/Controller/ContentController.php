<?php

namespace Controller;

use Entity\Link;
use ludk\Persistence\ORM;

class ContentController
{
    public function Create()
    {
        $orm = new ORM(__DIR__ . '/../Resources');
        $linkRepo = $orm->getRepository(Link::class);

        $manager = $orm->getManager();
        
        if (isset($_SESSION['user']) && isset($_POST['title']) && isset($_POST['shortDesc']) && isset($_POST['longDesc']) && isset($_POST['urlImage']) && isset($_POST['urlLink'])) {
            $errorMsg = NULL;
            if (empty($_POST['title']) || empty($_POST['shortDesc']) || empty($_POST['longDesc']) || empty($_POST['urlImage']) || empty($_POST['urlLink'])) {
                $errorMsg = "Not all fields have been completed. Please fill in all the blanks.";
            }
            if ($errorMsg) {
                include "../templates/postForm.php";
            } else {
                $newlink = new Link();
                $newlink->title = $_POST['title'];
                $newlink->shortDesc = $_POST['shortDesc'];
                $newlink->longDesc = $_POST['longDesc'];
                $newlink->urlImage = $_POST['urlImage'];
                $newlink->urlLink = $_POST['urlLink'];
                $newlink->createdAt = date("Y-m-d H:i:s");
                $newlink->userId = $_SESSION['user'];
                $manager->persist($newlink);
                $manager->flush();
                header('Location:/display');
            }
        } else {
            include "../templates/postForm.php";
        }
    }
}
