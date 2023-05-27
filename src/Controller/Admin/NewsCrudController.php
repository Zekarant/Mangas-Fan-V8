<?php

namespace App\Controller\Admin;


use App\Entity\News;
use App\Entity\User;
use App\Field\CustomAssociationField;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title_news', 'Titre ')->setRequired(true);
 
        yield SlugField::new('slug', 'Slug')
            ->setTargetFieldName('title_news');

        yield TextField::new('description_news', 'Description')->setRequired(true);

        yield TextareaField::new('content_news', 'Contenu')->setRequired(true);

        yield AssociationField::new('categories', 'Catégories');
        
        yield ImageField::new('image', 'Image')
        ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
        ->setBasePath('uploads/')
        ->setUploadDir('public/uploads');

        yield BooleanField::new('visibility', 'Visibilité')->onlyOnForms();
        
        yield DateTimeField::new('createdAt', 'Date de création')->hideOnForm();
        yield DateTimeField::new('updatedAt', 'Date de mise à jour')->hideOnForm();
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['createdAt' => 'DESC']); // Trie par date de création décroissante
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof News) {
            // Ici, remplacez $user par votre instance de User récupérée de l'authentification
            $user = $this->getUser();
            if ($user instanceof User) {
                $entityInstance->setAuthor($user);
            }
        }

        parent::persistEntity($entityManager, $entityInstance);
    }
    
}
