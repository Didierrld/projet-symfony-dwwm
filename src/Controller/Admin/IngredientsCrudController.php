<?php

namespace App\Controller\Admin;

use App\Entity\Ingredients;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IngredientsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ingredients::class;
    }

 
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            MoneyField::new('prix')->setCurrency('EUR'),
            DateTimeField::new('createdAt')
                ->setFormat('d/m/Y')
                ->setFormTypeOption('disabled', 'disabled')
                ->hideOnForm(),
        ];
    }
    
}
