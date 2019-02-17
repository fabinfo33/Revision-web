<?php

namespace App\Form;

use App\Entity\Enregistrement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnregistrementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('codeComposition')
            ->add('nomDeFichier')
            ->add('duree')
            ->add('dureeSeconde')
            ->add('prix')
            ->add('extrait')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enregistrement::class,
        ]);
    }
}
