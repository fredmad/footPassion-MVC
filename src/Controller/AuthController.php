<?php

namespace Controller;

use Entity\User;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class AuthController extends AbstractController
{
    public function Login(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        
        if ($request->request->has('username') && $request->request->has('password')) {
            $users = $userRepo->findBy(array("username" => $request->request->get("username")));
            if (count($users) == 1) {
                $oneuser = $users[0];
                if ($oneuser->password != ($request->request->get("password"))) {
                    return $this->render('loginForm.php', array("errorMsg" => "Il y a une erreur sur votre mot de passe."));
                } else {
                    $request->getSession()->set('user', $users[0]);
                    return $this->redirectToRoute('display');
                }
            } else {
                return $this->render('loginForm.php', array("errorMsg" => "Cet identifiant est inexistant."));
            }
        } else {
            return $this->render('loginForm.php');
        }
    }

    public function Logout(Request $request): Response
    {        
        if ($request->getSession()->has('user')) {
            $request->getSession()->remove('user');
        }
        return $this->redirectToRoute('display');
    }

    public function Register(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        $manager = $this->getOrm()->getManager();
        
        if ($request->request->has('username') && $request->request->has('password') && $request->request->has('passwordRetype')) {
            $errorMsg = NULL;
            $users = $userRepo->findBy(array("username" => $request->request->get("username")));

            if (count($users) > 0) {
                $errorMsg = "Username déjà utilisé.";
            } else if ($request->request->has('password') != $request->request->has('passwordRetype')) {
                $errorMsg = "Les mots de passe sont différents.";
            } else if (strlen(trim($request->request->has('password'))) < 8) {
                $errorMsg = "Votre mot de passe doit contenir au moins 8 caractères.";
            } else if (strlen(trim($request->request->has('username'))) < 4) {
                $errorMsg = "Votre username doit contenir au moins 4 caractères.";
            }
            if ($errorMsg) {
                $data = array(
                    "errorMsg" => $errorMsg
                );
                return $this->render('registerForm.php', $data);
            } else {
                $newUser = new User();
                $newUser->username = $request->request->get("username");
                $newUser->password = $request->request->get("password");
                $manager->persist($newUser);
                $manager->flush();
                $request->getSession()->set('user', $newUser);
                return $this->redirectToRoute('display');
            }
        } else {
            return $this->render('registerForm.php');
        }
    }
}
