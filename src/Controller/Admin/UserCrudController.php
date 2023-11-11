<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @method User getUser()
 */
class UserCrudController extends AbstractCrudController
{
    public function __construct(private readonly UserPasswordHasherInterface $passwordHasher, private readonly EntityRepository $entityRepository)
    {
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $userId = $this->getUser()->getId();

        $qb = $this->entityRepository->createQueryBuilder($searchDto, $entityDto, $fields, $filters);
        $qb->andWhere('entity.id != :user_id')
            ->setParameter('user_id', $userId);

        return $qb;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('username');

        yield ChoiceField::new('roles')
        ->allowMultipleChoices()
        ->setChoices([
            'Fondateur' => 'ROLE_FONDATOR',
            'Administrateur' => 'ROLE_ADMIN',
            'Développeur' => 'ROLE_DEVELOPPER',
            'Modérateur' => 'ROLE_MODERATOR',
            'Rédacteur' => 'ROLE_REDACTOR',
            'Newseur' => 'ROLE_NEWSEUR',
            'Animateur' => 'ROLE_ANIMATOR',
            'Community Manager' => 'ROLE_COMMUNITY',
            'Designer' => 'ROLE_DESIGNER',
            'Membre' => 'ROLE_USER',
            'Membre banni' => 'ROLE_BANNED'
        ]);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        /** @var User $user */
        $user = $entityInstance;

        // Assurez-vous que les rôles sont correctement gérés en fonction des choix de l'administrateur
        $roles = $user->getRoles();
        // $roles contient maintenant les rôles sélectionnés dans le formulaire

        // Mettez à jour les rôles de l'utilisateur en conséquence
        $user->setRoles($roles);

        parent::updateEntity($entityManager, $entityInstance);
    }


    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        /** @var User $user */
        $user = $entityInstance;

        $plainPassword = $user->getPassword();
        $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);
        parent::persistEntity($entityManager, $entityInstance);
    }
}
