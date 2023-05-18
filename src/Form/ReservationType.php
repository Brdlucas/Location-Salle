<?php

namespace App\Form;

use App\Entity\Reservations;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\SlugType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use function PHPSTORM_META\type;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,  [
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('status', TextType::class,  [
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('preReservation', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('startDate', DateTimeType::class, [
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('endDate', DateTimeType::class, [
                'attr' => [
                    'class' => 'form-control',
                ]
                ])
            ->add('room')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
        ]);
    }
}