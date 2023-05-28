<?php 

namespace App\Form\Type;

use App\Entity\Category;
use App\Entity\Images;
use App\Entity\News;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\SlugType;
use SebastianBergmann\CodeCoverage\Report\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Image;

class NewsType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title_news', TextType::class, [
            'label' => 'Titre de la news : ',
            'attr' => array(
                'placeholder' => 'Saisir le titre de la news ici',
                'class' => 'form-control bg-dark mb-4 text-light',
                'required' => true,
                'maxlength' => 50,
                'minlength' => 10
            )
        ])
        ->add('description_news', TextareaType::class, [
            'label' => 'Description de la news : ',
            'attr' => array(
                'placeholder' => 'Saisir une description de la news',
                'class' => 'form-control bg-dark mb-4 text-light',
                'required' => true,
                'maxlength' => 300,
                'minlength' => 10
            )
        ])
        ->add('content_news', TextareaType::class, [
            'label' => 'Contenu de la news : ',
            'attr' => array(
                'placeholder' => 'Saisir ici le contenu de la news',
                'class' => 'form-control bg-dark mb-4 text-light'
            )
        ])
        ->add('image', FileType::class, [
            'label' => "Image de la news :",
            'required' => true,
            'mapped' => false,
            'constraints' => [
                new Image([
                    'maxSize' => '5M',
                    'mimeTypes' => ['image/jpeg', 'image/png'],
                ]),
            ],
            'attr' => array(
                'class' => "form-control bg-dark mb-4 text-light"
            )
         ])
            ->add('slug', HiddenType::class)
        ->add('categories', EntityType::class, [
            'label' => "Catégories de la news :",
            'class' => Category::class,
            'choice_label' => 'name',
            'multiple' => true,
            'expanded' => false,
            'attr' => [
                'class' => 'selectize mb-4',
                'placeholder' => "Sélectionnez les catégories de la news"
            ],

        ])
        ->add('keywords_news', TextType::class, [
            'label' => "Mots clés de la news :",
            'attr' => array(
                'class' => "form-control bg-dark text-light",
                'placeholder' => "Saisir les mots clés de la news, séparés par des virgules"
            )
        ])
        ->addEventListener(FormEvents::PRE_SUBMIT, function(FormEvent $event){
            $data = $event->getData();
            $form = $event->getForm();

            if(!empty($data['title_news'])){
                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['title_news'])));
                $data['slug'] = $slug;
            }

            $event->setData($data);
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}