<?php

namespace App\Controller\Admin;

use App\Entity\VRList;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VRListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VRList::class;
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
