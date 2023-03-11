<?php 

namespace App\Form\Type;

use App\Entity\Category;
use App\Entity\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class NewsType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title_news', TextType::class, [
            'label' => 'Titre de la news : ',
            'attr' => array(
                'placeholder' => 'Saisir le titre de la news ici',
                'class' => 'form-control bg-dark mb-2 text-light',
                'required' => true,
                'maxlength' => 50,
                'minlength' => 10
            )
        ])
        ->add('description_news', TextareaType::class, [
            'label' => 'Description de la news : ',
            'attr' => array(
                'placeholder' => 'Saisir une description de la news',
                'class' => 'form-control bg-dark text-light',
                'required' => true,
                'maxlength' => 300,
                'minlength' => 10
            )
        ])
        ->add('content_news', TextareaType::class, [
            'label' => 'Contenu de la news : ',
            'attr' => array(
                'placeholder' => 'Saisir ici le contenu de la news',
                'class' => 'form-control bg-dark text-light'
            )
        ])
        ->add('author', HiddenType::class)
        ->add('categories', EntityType::class, [
            // looks for choices from this entity
            'class' => Category::class,
            'choice_label' => 'name',
            'multiple' => true,
            'expanded' => true,
            'attr' => [
                'class' => 'form-check',
            ],
            
        ])
        ->add('sendComment', SubmitType::class, [
            'label' => 'Envoyer',
            'attr' => [
                'class' => 'buttonComment'
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => News::class,
            'csrf_token_id' => 'comments-add'
        ]);
    }
}