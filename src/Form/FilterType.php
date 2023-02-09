<?php

namespace App\Form;

use App\Component\FilterRequest;
use App\Entity\Campus;
use App\Entity\Sortie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('campus', EntityType::class, [
                'class'=>Campus::class,
                'choice_label' => 'nom'
            ])
            ->add('nom', TextareaType::class, [
                'required'=>false
            ])
            ->add('dateDebut', DateType::class,[
                'html5'=>true,
                'widget' => 'single_text',
                'label' => 'Entre',
                'required'=>false,
                'empty_data' => '',
                'by_reference' => false,
            ])
            ->add('dateFin', DateType::class,[
                'html5'=>true,
                'widget' => 'single_text',
                'label' => 'et',
                'required'=>false,
                'empty_data' => '',
                'by_reference' => false,
            ])
            ->add('organisateur', CheckboxType::class,[
                'required'=>false,
                'label' => 'Sorties dont je suis l\'organisat.eur.rice',
            ])
            ->add('inscrit', CheckboxType::class,[
                'required'=>false,
                'label' => 'Sorties auxquelles je suis inscrit.e',
            ])
            ->add('nonInscrit', CheckboxType::class,[
                'required'=>false,
                'label' => 'Sorties auxquelles je ne suis pas inscrit.e',
            ])
            ->add('sortiesPassees', CheckboxType::class,[
                'required'=>false,
                'label' => 'Sorties passées',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FilterRequest::class,
        ]);
    }
}
