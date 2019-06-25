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
                )
            ))
            ->add('clientCompany', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Entreprise du client',
                )
            ))
            ->add('total')
            ->add('VAT', IntegerType::class, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => '',
                ),
            ))
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
                    'placeholder' => 'Date d\'échéance',
                    'data-language' => 'fr'
                )
            ))
            ->add('projectDescription', TextareaType::class, array(
                'attr' => array(
                    'placeholder' => 'Description du projet'
                )
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
            ))
            ->add('invoiceNumber', TextType::class, array(
                'attr' => array(
                    'placeholder' => '############',
                ),
            ))
            ->add('referenceNo', TextType::class, array(
                'attr' => array(
                    'placeholder' => '############',
                ),
            ))
            ->add('invoiceTerms', TextareaType::class, array(
                'attr' => array(
                    'placeholder' => '14 jours de préavis',
                ),
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
