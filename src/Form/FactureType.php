<?php

namespace App\Form;

use App\Entity\Facture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('myCompany', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Mon entreprise',
                ),
                'required' => false,
            ))
            ->add('clientCompany', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Entreprise du client',
                ),
                'required' => false,
            ))
            ->add('total')
            ->add('VAT', IntegerType::class, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => '',
                ),
                'required' => false,
            ))
            ->add('invoiceDate', DateType::class, array(
                'label' => 'Date de facturation',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Date de facturation',
                    'data-language' => 'fr',
                ),
                'required' => false,
            ))
            ->add('dueDate', DateType::class, array(
                'label' => 'Date d\'échéance',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Date d\'échéance',
                    'data-language' => 'fr'
                ),
                'required' => false,
            ))
            ->add('projectDescription', TextareaType::class, array(
                'attr' => array(
                    'placeholder' => 'Description du projet'
                ),
                'required' => false,
            ))
            ->add('paymentMethods', ChoiceType::class, array(
                'placeholder' => '',
                'choices' => array(
                    'Carte bancaire' => 'Carte bancaire',
                    'Virement bancaire' => 'Virement bancaire',
                    'Chèque' => 'Chèque',
                    'PayPal' => 'PayPal',
                    'Autre' => 'Autre',
                ),
                'required' => false,
            ))
            ->add('invoiceNumber', TextType::class, array(
                'attr' => array(
                    'placeholder' => '############',
                ),
                'required' => false,
            ))
            ->add('referenceNo', TextType::class, array(
                'attr' => array(
                    'placeholder' => '############',
                ),
                'required' => false,
            ))
            ->add('invoiceTerms', TextareaType::class, array(
                'attr' => array(
                    'placeholder' => '14 jours de préavis',
                ),
                'required' => false,
            ))
            ->add('descriptions', CollectionType::class, array(
                'label' => false,
                'entry_type' => DescriptionType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'delete_empty' => true,
            ))
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }
}
