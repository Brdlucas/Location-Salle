<?php

namespace App\Controller\Admin;

use App\Entity\Rooms;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RoomsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rooms::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('capacity'),
            TextField::new('description'),
            TextField::new('city'),
            TextField::new('address'),
            IntegerField::new('price'),
            AssociationField::new('material'),
            AssociationField::new('Ergonomic'),
            AssociationField::new('Software'),
        ];
    }

}