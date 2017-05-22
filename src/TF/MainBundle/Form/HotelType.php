<?php

namespace TF\MainBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HotelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::Class)
            ->add('city', TextType::class)
            ->add('price', NumberType::class)
            ->add('Options', OptionsType::class)
            ->add('country', EntityType::class, array(
                'choice_label' => 'name',
                'class' => 'TF\MainBundle\Entity\Country',
                'multiple' => false,
                'expanded' => false,
                'label' => 'Pays',
                'required' => false,
                'attr' => array("class" => "maClasse")
            ))
            ->add('MainPicture', PictureType::class)
            ->add('pictures', CollectionType::class, array(
                'entry_type' => PictureType::class

            ))
            ->add('submit', SubmitType::class);
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TF\MainBundle\Entity\Hotel'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tf_mainbundle_hotel';
    }


}
