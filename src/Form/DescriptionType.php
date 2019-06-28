<?php

namespace App\Form;

use App\Entity\Description;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class DescriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextType::class, array(
                'label' => false,
                'attr' => array(
                    'class' => 'input',
                ),
                'required' => false,
            ))
            ->add('unit', IntegerType::class, array(
                'label' => false,
                'attr' => array(
                    'class' => 'input unit',
                ),
                'required' => false,
            ))
            ->add('price', IntegerType::class, array(
                'label' => false,
                'attr' => array(
                    'class' => 'input price',
                ),
                'required' => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Description::class,
        ]);
    }
}
