<?php

namespace App\Form;

use App\Entity\Facture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('myCompany', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Mon entreprise',
                )
            ))
            ->add('clientCompany', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Entreprise du client',
                )
            ))
            ->add('total')
            ->add('VAT')
            ->add('invoiceDate', DateType::class, array(
                'label' => 'Date de facturation',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Date de facturation',
                    'data-language' => 'fr',
                )
            ))
            ->add('dueDate', DateType::class, array(
                'label' => 'Date d\'échéance',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'required' => true,
                'attr' => array(
                    'data-language' => 'fr'
                )
            ))
            ->add('projectDescription')
            ->add('paymentMethods', ChoiceType::class, array(
                'choices' => array(
                    'Carte de crédit' => 'Carte de crédit',
                    'PayPal' => 'PayPal',
                ),
            ))
            ->add('details')
            ->add('invoiceNumber')
            ->add('referenceNo')
            ->add('invoiceTerms')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }
}