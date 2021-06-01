<?php

namespace Controller;

use Entity\Link;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class ContentController extends AbstractController
{
    public function Post(Request $request): Response
    {
        $manager = $this->getOrm()->getManager();

        if ($request->request->has('title') && $request->request->has('shortDesc') && $request->request->has('longDesc') && $request->request->has('urlImage') && $request->request->has('urlLink') && $request->request->has('user')) {
            // $errorMsg = NULL;
            // if (empty($request->request->get('title')) || empty($request->request->get('shortDesc')) || empty($request->request->get('longDesc')) || empty($request->request->get('urlImage')) || empty($request->request->get('urlLink'))) {
            //     $errorMsg = "Tous les champs ne sont pas remplis. Merci de remplir tous les champs.";
            // }
            // if ($errorMsg) {
            //     $data = array(
            //         "errorMsg" => $errorMsg
            //     );
            //     return $this->render('postForm.php', $data);
            // } else {
                $newLink = new Link();
                $newLink->title = $request->request->get("title");
                $newLink->shortDesc = $request->request->get("shortDesc");
                $newLink->longDesc = $request->request->get("longDesc");
                $newLink->urlImage = $request->request->get("urlImage");
                $newLink->urlLink = $request->request->get("urlLink");
                $newLink->createdAt = date("Y-m-d H:i:s");
                $newLink->userId = $request->getSession()->get('user');
                $manager->persist($newLink);
                $manager->flush();
                return $this->redirectToRoute('display');
            // }
        } else {
            return $this->render('postForm.php');
        }
    }
}
