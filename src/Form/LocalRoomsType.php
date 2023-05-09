<?php

namespace App\Form;

use App\Entity\LocalRooms;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocalRoomsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('roomCapacity')
            ->add('city')
            ->add('address')
            ->add('price')
            ->add('description')
            ->add('id_ergonomics')
            ->add('id_material')
            ->add('id_software')
            ->add('reservations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LocalRooms::class,
        ]);
    }
}
