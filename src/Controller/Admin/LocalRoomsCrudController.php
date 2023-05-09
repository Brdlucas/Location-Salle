<?php

namespace App\Controller\Admin;

use App\Entity\LocalRooms;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LocalRoomsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LocalRooms::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}