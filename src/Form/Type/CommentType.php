<?php

namespace App\Form\Type;

use App\Entity\News;
use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $builder->add('content', TextareaType::class, [
            'label' => 'Votre message',
            'attr' => [
                'placeholder' => 'Saisir votre commentaire',
            ],
        ])
        ->add('news', HiddenType::class)
        ->add('sendComment', SubmitType::class, [
            'label' => 'Envoyer',
            'attr' => ['class' => 'buttonComment'],
        ]);

        $builder->get('news')->addModelTransformer(new CallbackTransformer(
            fn (News $news) => $news->getId(),
            fn (News $news) => $news->getTitle()
        ));
    }

    /**
     * @param OptionsResolver $resolver
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
            'csrf_token_id' => 'comments-add',
        ]);
    }
}
