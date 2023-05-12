<?php

namespace App\Controller\Admin;

use App\Entity\Capacity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CapacityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Capacity::class;
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
