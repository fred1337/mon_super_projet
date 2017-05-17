<?php

namespace TF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function HomeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository("TFMainBundle:User");
        $u = $repo->find($id);
        return $this->render(
            "TFMainBundle:Default:Home.html.twig",
            array(
                'user' => $u
            )
        );
    }
}
