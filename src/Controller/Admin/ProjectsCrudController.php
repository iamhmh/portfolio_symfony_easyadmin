<?php

namespace App\Controller\Admin;

use App\Entity\Projects;
use App\Form\ImageCollectionType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class ProjectsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projects::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),

            CollectionField::new('ProjectImage')
                ->setEntryIsComplex(true)
                //->setFormType(ImageCollectionType::class)   
                ->setTemplatePath('admin/pictures.html.twig')
                ,

            TextField::new('ProjectTitle'),
            TextField::new('ProjectSubTitle'),

            TextField::new('ProjectContent'),

        ];
    }
}
