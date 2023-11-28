<?php

namespace App\Controller\Admin;

use App\Entity\ControllerList;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ControllerListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ControllerList::class;
    }

    
    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         IdField::new('id'),
    //         TextField::new('title'),
    //         TextEditorField::new('description'),
    //     ];
    // }
    
}
