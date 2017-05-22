<?php

namespace TF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TF\MainBundle\Entity\Hotel;
use TF\MainBundle\Form\HotelType;

class HotelController extends Controller
{
    public function addAction()
    {
        $hotel = new Hotel();
        $form = $this->createForm(HotelType::class, $hotel);
        return $this->render('TFMainBundle:Hotel:add.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
