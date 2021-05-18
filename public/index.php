<?php

use Entity\Link;
use Entity\User;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$orm = new ORM(__DIR__ . '/../Resources');
$linkRepo = $orm->getRepository(Link::class);
$userRepo = $orm->getRepository(User::class);

$manager = $orm->getManager();

$action = $_GET["action"] ?? "display";

switch ($action) {
    case 'register':
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
            $errorMsg = NULL;
            $criteria = [
                "username" => $_POST['username']
            ];
            $users = $userRepo->findBy($criteria);
            if (count($users) > 0) {
                $errorMsg = "Username already used.";
            } else if ($_POST['password'] != $_POST['passwordRetype']) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($_POST['password'])) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($_POST['username'])) < 4) {
                $errorMsg = "Your nickame should have at least 4 characters.";
            }
            if ($errorMsg) {
                include "../templates/registerForm.php";
            } else {
                $newUser = new User();
                $newUser->username = $_POST['username'];
                $newUser->password = $_POST['password'];
                $manager->persist($newUser);
                $manager->flush();
                $_SESSION['user'] = $newUser;
                header('Location: ?action=display');
            }
        } else {
            include "../templates/registerForm.php";
        }
        break;
    case 'logout':
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: ?action=display');
        break;
    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $criteria = [
                "username" => $_POST['username'],
                "password" => $_POST['password']
            ];
            $users = $userRepo->findBy($criteria);
            if (count($users) == 1) {
                $_SESSION['user'] = $users[0];
                header('Location: ?action=display');
            } else {
                $errorMsg = "Wrong username and/or password.";
                include "../templates/loginForm.php";
            }
        } else {
            include "../templates/loginForm.php";
        }
        break;
    case 'new':
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
                header('Location: ?action=display');
            }
        } else {
            include "../templates/postForm.php";
        }
        break;
    case 'display':
    default:
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
        break;
}

?>