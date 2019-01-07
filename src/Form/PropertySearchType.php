<?php

namespace App\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Province;
use App\Entity\Town;
use App\Entity\ConstructionType;
use App\Entity\Amenity;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('constructionType', EntityType::class, [
                'class' => ConstructionType::class,
                'query_builder' => function (EntityRepository $er) {
                    $constructionTypeId = [1, 2, 4, 5, 6, 7];
                    return $er->createQueryBuilder('ct')
                        ->where('ct.id IN (:id)')
                        ->setParameter('id', $constructionTypeId)
                        ->orderBy('ct.name', 'ASC');
                }
            ])
            ->add('bedrooms', TextType::class)
            ->add('bathrooms', TextType::class)
            ->add('amenity', EntityType::class, [
                'class' => Amenity::class,
                'multiple' => true,
                'query_builder' => function (EntityRepository $er) {
                    $amenitiesId = [2, 3, 4, 5, 6, 7, 8, 9, 10, 12];
                    return $er->createQueryBuilder('a')
                        ->where('a.id IN (:id)')
                        ->setParameter('id', $amenitiesId)
                        ->orderBy('a.name', 'ASC');
                }
            ])
            ->add('province', EntityType::class, [
                'class' => Province::class,
                'placeholder' => 'Choose province',
                'multiple' => true
            ])
            ->get('province')->addEventListener(FormEvents::SUBMIT, [$this, 'addTowns']);
        ;
    }

    public function addTowns(FormEvent $event)
    {
        $form = $event->getForm()->getParent(); // modify the **parent** form
        // during SUBMIT event, ->getData() actually is the resolved object
        $data = $event->getData();

        if (empty($data)) {
            return;
        }

        $form->add('town', EntityType::class, [
            'class' => Town::class,
            'placeholder' => 'Choose town',
            'multiple' => true,
            'query_builder' => function (EntityRepository $er) use ($data) {
                dump($data);
                return $er->createQueryBuilder('t')
                    ->where('t.province IN (:province)')
                    ->setParameter('province', $data[0])
                    ->orderBy('t.name', 'ASC');
            }
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
