<?php
// src/AppBundle/DataFixtures/ORM/LoadUserData.php

namespace TF\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use TF\MainBundle\Entity\Picture;
use TF\MainBundle\Entity\User;


class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
       $user = new User();
       $avatar = new Picture();

       $avatar->setAlt("profil")->setUrl("img/591dafbda2a4e.jpg");
       $avatar2 = new Picture();
       $avatar2->setAlt("profil")->setUrl("img/591dafbda2a4e.jpg");
       $encoder = new messageDigestPasswordEncoder('sha512',true, 4756);
       $password = $encoder->encodePassword("test",$user->getSalt());
       $admin = new User();
       $password2 = $encoder->encodePassword("admin",$admin->getSalt());

       $user->setFisrtName("Khun")
           ->setLastName("Ly")
           ->setEmail("lykhun@gmail.com")
           ->setpassword($password)
           ->setAvatar($avatar)
            ;

        $admin->setFisrtName("admin")
            ->setLastName("admin")
            ->setEmail("admin@admin.be")
            ->setpassword($password2)
            ->setRoles(array("ROLE_ADMIN"))
            ->setAvatar($avatar2)
            ;
        $manager->persist($avatar);
        $manager->persist($avatar2);
        $manager->persist($user);
        $manager->persist($admin);

       $manager->flush();
    }
}
?>