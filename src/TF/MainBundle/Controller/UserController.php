<?php

namespace TF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
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
            //dump($user);die;
            $encoder = new messageDigestPasswordEncoder('sha512',true, 4756);
            $password = $encoder->encodePassword($user->getPassword(),$user->getSalt());

            $user->getAvatar()->upload();
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

    public function loginAction()
    {
            if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                $this->redirectToRoute('main_default_home');
            }
        return $this->render("TFMainBundle:User:login.html.twig");
    }
}
