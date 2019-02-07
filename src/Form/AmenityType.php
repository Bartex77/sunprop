<?php

namespace App\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use App\Entity\Amenity;
use App\Entity\Property;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AmenityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', TranslationsType::class)
/*            ->add('translations', TranslationsType::class, [
                'fields' => [
                    'name' => [
                        'field_type' => TextType::class,
                        'constraints' => new NotBlank
                    ]
                ]
            ])*/
            ->add('visibleRent')
            ->add('visibleSale')
            ->add('showOrder')
            ->add('properties', EntityType::class, [
                'class' => Property::class,
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.name', 'ASC');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Amenity::class,
        ]);
    }
}
