<?php

namespace App\Form;

use App\Entity\Reservations;
use App\Entity\Rooms;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
        $user = $options['user'];
        
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
            ->add('room', EntityType::class, [
                'class' => Rooms::class,
                
                ])
                ->add('user', TextType::class, [
                    'data' => $user->getFirstName(),
                ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
            'user' => null,
        ]);
        $resolver->setAllowedTypes('user', [User::class, 'null']);

    }
}