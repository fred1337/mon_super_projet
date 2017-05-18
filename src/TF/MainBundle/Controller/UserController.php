<?php

namespace TF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TF\MainBundle\Entity\User;
use TF\MainBundle\Form\UserType;

class UserController extends Controller
{
    public function RegisterAction()
    {
        $form = $this->createForm(UserType::class, new User());
        return $this->render("TFMainBundle:User:register.html.twig",
            array(
                'form' => $form->createView()
            )
        );
    }
}
