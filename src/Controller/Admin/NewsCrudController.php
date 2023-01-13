<?php

namespace App\Controller\Admin;

use App\Entity\News;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title_news');
 
        yield SlugField::new('slug')
            ->setTargetFieldName('title_news');

        yield TextField::new('description_news');

        yield TextEditorField::new('content_news');

        yield AssociationField::new('categories');
        

        yield AssociationField::new('image');

        yield DateTimeField::new('createdAt')->hideOnForm();
        yield DateTimeField::new('updatedAt')->hideOnForm();
    }
    
}
