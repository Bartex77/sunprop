<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('bedrooms')
            ->add('bathrooms')
            ->add('livingRooms')
            ->add('surface')
            ->add('seaDistance')
            ->add('seaDistanceUnit')
            ->add('maxNumberOfPeople')
            ->add('minimumStay')
            ->add('amenities')
            ->add('additionalEquipment')
            ->add('additionalServices')
            ->add('additionalFees')
            ->add('status')
            ->add('type')
            ->add('constructionType')
            ->add('town')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
