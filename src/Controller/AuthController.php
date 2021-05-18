<?php

namespace Controller;

use Entity\User;
use ludk\Persistence\ORM;

class AuthController
{
    public function Login()
    {
        $orm = new ORM(__DIR__ . '/../Resources');
        $userRepo = $orm->getRepository(User::class);
        
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $criteria = [
                "username" => $_POST['username'],
                "password" => $_POST['password']
            ];
            $users = $userRepo->findBy($criteria);
            if (count($users) == 1) {
                $_SESSION['user'] = $users[0];
                header('Location:/display');
            } else {
                $errorMsg = "Wrong username and/or password.";
                include "../templates/loginForm.php";
            }
        } else {
            include "../templates/loginForm.php";
        }
    }

    public function Logout()
    {
        $orm = new ORM(__DIR__ . '/../Resources');
        $userRepo = $orm->getRepository(User::class);
        
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location:/display');
    }

    public function Register()
    {
        $orm = new ORM(__DIR__ . '/../Resources');
        $userRepo = $orm->getRepository(User::class);

        $manager = $orm->getManager();
        
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
                header('Location:/display');
            }
        } else {
            include "../templates/registerForm.php";
        }
    }
}
