<?php

namespace TF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TF\MainBundle\Entity\User;
use TF\MainBundle\Form\UserType;

class UserController extends Controller
{
    public function RegisterAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isValid()) {
            dump($user);die;
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        return $this->render("TFMainBundle:User:register.html.twig",
            array(
                'form' => $form->createView()
            )
        );
    }
}
