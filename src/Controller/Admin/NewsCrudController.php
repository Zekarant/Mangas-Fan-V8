<?php

namespace App\Controller\Admin;

use App\Entity\News;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title_news', 'Titre')
            ->setRequired(true)
            ->setColumns(6)
            ->setFormTypeOption('label', 'Titre :')
            ->setFormTypeOption('attr', ['placeholder' => 'Saisir un titre pour la new']);

        yield SlugField::new('slug', 'Slug')
            ->setTargetFieldName('title_news')
            ->setColumns(6)
            ->setFormTypeOption('label', 'Slug de la new (Ne pas modifier, il s\'agit de l\'URL utilisée pour la new) :')
            ->setFormTypeOption('attr', ['placeholder' => 'Slug automatique'])
           ;

        yield TextField::new('description_news', 'Description')
            ->setRequired(true)
            ->setColumns(6)
            ->setFormTypeOption('label', 'Description :')
            ->setFormTypeOption('attr', ['placeholder' => 'Saisir une description pour la new']);


        yield AssociationField::new('categories', 'Catégories')
            ->setColumns(6)
            ->setFormTypeOption('label', 'Catégories :')
            ->setFormTypeOption('attr', ['placeholder' => 'Sélectionnez une ou plusieurs catégories']);

        yield ImageField::new('image', 'Image')
            ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads')
            ->setColumns(6)
            ->setFormTypeOption('label', 'Sélectionnez une image pour la news :');

        yield BooleanField::new('visibility', 'Visibilité')
            ->onlyOnForms()
            ->setColumns(6)
            ->setFormTypeOption('label', 'Souhaitez-vous que la new soit visible ?');

         yield TextField::new('keywords_news', 'Mots-clés')
            ->setColumns(6)
            ->setFormTypeOption('label', 'Mots-clés :')
            ->setFormTypeOption('attr', ['placeholder' => 'Saisir des mots-clés séparés par une virgule']);

        yield TextField::new('sources', 'Sources')
            ->setColumns(6)
            ->setFormTypeOption('label', 'Sources :')
            ->setFormTypeOption('attr', ['placeholder' => 'Saisir les sources de la news séparées par une virgule'])
            ->onlyOnForms();

        yield TextEditorField::new('content_news', 'Contenu')
            ->setRequired(true)
            ->setColumns(12)
            ->setFormTypeOption('label', 'Saisir le contenu :')
            ->setFormType(CKEditorType::class)
            ->onlyOnForms();

        yield DateTimeField::new('createdAt', 'Date de création')->hideOnForm();
        yield DateTimeField::new('updatedAt', 'Date de mise à jour')->hideOnForm();
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
            ->setPageTitle('new', 'Ajouter une nouvelle new')
            ->setPageTitle('index', 'News du site')
            ->setPageTitle('edit', 'Editer une new')
            ->setEntityLabelInSingular('une nouvelle new')
            ->setDefaultSort(['createdAt' => 'DESC']);
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
