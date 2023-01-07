<?php

namespace App\Controller\Admin;

use App\Entity\Comments;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comments::class;
    }

    public function configureActions(Actions $actions): Actions {
        return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextareaField::new('content');
        yield DateTimeField::new('createdAt');
        yield AssociationField::new('user');
    }
   
}
