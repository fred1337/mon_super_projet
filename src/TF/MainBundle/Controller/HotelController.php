<?php

namespace TF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use TF\MainBundle\Entity\Hotel;
use TF\MainBundle\Form\HotelType;

class HotelController extends Controller
{
    public function addAction(Request $request)
    {
        $hotel = new Hotel();
        $form = $this->createForm(HotelType::class, $hotel);
        $form->handleRequest($request);
        if ($form->isValid()) {
            //dump($hotel);die;
            $hotel->getMainPicture()->setAlt("Main");
            $hotel->getMainPicture()->upload();
            foreach ($hotel->getPictures() as $p) {
                $p->setAlt("photo");
                $p->upload();
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($hotel);
            $em->flush();
            $this->addFlash('success_messages', 'Votre hotel a bien été enregistré');

            return $this->redirectToRoute("main_default_home");
        }
        return $this->render('TFMainBundle:Hotel:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function readAction() {
        $hotels= $this->getDoctrine()->getManager()->getRepository('TFMainBundle:Hotel')->findAll();
        return $this->render('TFMainBundle:Default:Home.html.twig', array('hotels' => $hotels));
    }
}
