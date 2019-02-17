<?php

namespace App\Form;

use App\Entity\Achat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AchatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('achatConfirme', CheckboxType::class, [
                'data' => true //par défaut la case est cochée
            ]);
            //->add('codeEnregistrement')
            //->add('codeAbonne')
            //->add('abonne')
            //->add('enregistrement')
            //->add('sauver', SubmitType::class);
//            ->add('achats', CollectionType::class,
//            [
//                'entry_type' => Achat::class
//                ]);
//
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Achat::class,
        ]);
    }
}
