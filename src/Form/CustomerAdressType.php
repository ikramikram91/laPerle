<?php

namespace App\Form;

use App\Entity\CustomerAdress;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\NotBlank;

class CustomerAdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class,[
            'label'=> 'Prenom',
            'constraints' => new NotBlank([
                'message' => 'Please enter a name',
            ])
        ])
        ->add('lastname', TextType::class,[
            'label' => 'Nom',
            'constraints' => new NotBlank([
                'message' => 'Please enter a lastname',
            ])
        ])
        ->add('email', EmailType::class,[
            'constraints' => new NotBlank([
                'message' => 'Please enter a email',
            ])
        ])
        ->add('adress', TextType::class,[
            'label' => 'Adresse postale',
            'constraints' => new NotBlank([
                'message' => 'Please enter a adress',
            ])
        ])
            ->add('cp', NumberType::class,[
                'label'=> 'Code postal',
                'constraints' => new NotBlank([
                    'message' => 'Please enter a postal code',
                ])
            ])
            ->add('town', TextType::class,[
                'label'=>'Ville',
                'constraints' => new NotBlank([
                    'message' => 'Please enter a town',
                    ])
            ])
            ->add('country', ChoiceType::class,[
                'label'=>'Pays',
                'choices'=>['France'=>"France"]
            ])
            
            ->add('rgpd', CheckboxType::class,[
                'label'=> 'En cochant cette case vous accepter que vos donnée soit conservé',
                'constraints' => [
                    new NotBlank() // permet la protection cotés serveur pour ne pas bidouiller le code en inspecteur obliger a cocher la case même si on touche au code on retirant le require
                ],
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CustomerAdress::class,
        ]);
    }
}
