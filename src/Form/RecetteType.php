<?php

namespace App\Form;

use App\Entity\Ingredients;
use App\Entity\Recettes;
use App\Repository\IngredientsRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert;
class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'attr' =>[
                    'class' => 'form-control',
                    'minlength' => '5',
                    'maxlength' => '50'
                ],
                'label'=>'Nom',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('temps',IntegerType::class,[
                'attr' =>[
                    'class' => 'form-control',
                    'minlength' => '1',
                    'maxlength' => '1441'
                ],
                'required' => false,
                'label'=>'Temps',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('personne',IntegerType::class,[
                'attr' =>[
                    'class' => 'form-control',
                    'min'=>'1',
                    'maxlength' => '50'
                ],
                'required' => false,
                'label'=>'Personne',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('difficulte',RangeType::class,[
                'attr' =>[
                    'class' => 'form-range',
                    'min' => '1',
                    'max' => '5'
                ],
                'required' => false,
                'label'=>'Difficulte',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('description',TextareaType::class,[
                'attr' =>[
                    'class' => 'form-control',
                ],
                'label'=>'Description',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('prix', MoneyType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ],
                'required' => false,
                'label'=>'Prix',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('favori', CheckboxType::class,[
                'attr'=>[
                    'class'=>'form-check '
                ],
                'label'=>'Favori',
                'label_attr'=>[
                    'class'=> 'form-label mt-4 '
                ],
              
            ])
            ->add('ingredients', EntityType::class,[
                'class'=>Ingredients::class,
                'query_builder'=>function(IngredientsRepository $er){
                    return $er -> createQueryBuilder('i')
                        ->orderBy('i.nom', 'ASC');
                },
                'choice_label' => 'nom',
                'multiple'=>'true',
                'expanded'=>'true',
                'label'=>'Les ingrédients',
                'label_attr'=>[
                    'class'=> 'form-check mt-4'
                ],
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recettes::class,
        ]);
    }
}
