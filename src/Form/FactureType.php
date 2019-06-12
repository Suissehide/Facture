<?php

namespace App\Form;

use App\Entity\Facture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('myCompany')
            ->add('clientCompany')
            ->add('total')
            ->add('VAT')
            ->add('invoiceDate')
            ->add('due_date')
            ->add('projectDescription')
            ->add('paymentMethods')
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
