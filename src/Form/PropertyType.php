<?php

namespace App\Form;

use App\Entity\Amenity;
use App\Entity\District;
use App\Entity\Property;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('link')
            ->add('name')
            ->add('description')
            ->add('bedrooms')
            ->add('bathrooms')
            ->add('livingRooms')
            ->add('price')
            ->add('surface')
            ->add('seaDistance')
            ->add('seaDistanceUnit')
            ->add('maxNumberOfPeople')
            ->add('minimumStay')
            ->add('amenities', EntityType::class, [
                'class' => Amenity::class,
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.name', 'ASC');
                }
            ])
            ->add('additionalEquipment')
            ->add('additionalServices')
            ->add('additionalFees')
            ->add('status')
            ->add('propertytype')
            ->add('constructionType')
            ->add('town')
            ->add('district', EntityType::class, [
                'class' => District::class,
                'placeholder' => 'Choose district'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
