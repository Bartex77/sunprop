<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Status;
use App\Entity\Propertytype;
use App\Entity\Province;
use App\Entity\Town;
use App\Entity\ConstructionType;
use App\Entity\Amenity;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', EntityType::class, ['class' => Status::class])
            ->add('propertytype', EntityType::class, ['class' => Propertytype::class])
            ->add('constructionType', EntityType::class, ['class' => ConstructionType::class])
            ->add('province', EntityType::class, ['class' => Province::class, 'placeholder' => 'Choose province'])
            ->add('town', EntityType::class, ['class' => Town::class, 'placeholder' => 'Choose town'])
            ->add('bedrooms', TextType::class)
            ->add('bathrooms', TextType::class)
            ->add('amenity', EntityType::class, ['class' => Amenity::class, 'multiple' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
