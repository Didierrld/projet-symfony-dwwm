<?php

namespace App\Controller\Admin;

use App\Entity\Recettes;
use App\Entity\Ingredients;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class RecettesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recettes::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            AssociationField::new('categorie')
                ->autocomplete(),
            NumberField::new('temps'),
            NumberField::new('personne'),
            NumberField::new('difficulte'),
            TextareaField::new('description'),
            MoneyField::new('prix')->setCurrency('EUR'),
            BooleanField::new('favori'),
            AssociationField::new('ingredients')
                ->autocomplete(),
            DateTimeField::new('createdAt')
                ->setFormat('d/m/Y')
                ->setFormTypeOption('disabled', 'disabled')
                ->hideOnForm(),
            DateTimeField::new('updateAt')
                ->setFormat('d/m/Y')
                ->setFormTypeOption('disabled', 'disabled')
                ->hideOnForm(),
        ];
    }
    
}
