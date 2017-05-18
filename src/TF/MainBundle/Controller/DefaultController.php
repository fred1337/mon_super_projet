<?php

namespace TF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TF\MainBundle\Entity\Picture;
use TF\MainBundle\Entity\User;

class DefaultController extends Controller
{
    public function HomeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setLastName("LY")
            ->setFisrtName("Khun")
            ->setRoles(["ROLE_USER"])
            ->setPassword("")
            ->setSalt("")
            ->setEmail("");
        $p = new Picture();
        $p->setAlt("image khun")->setUrl("img.jpg");
            $user->setAvatar($p);
            $em->persist($user);
            $em->persist($p);
            $em->flush();
        return $this->render(
            "TFMainBundle:Default:Home.html.twig"

        );
    }

    public function ContactAction()
    {
        return $this->render("TFMainBundle:Default:Contact.html.twig");
    }
}
