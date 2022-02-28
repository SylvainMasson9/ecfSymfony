<?php

namespace App\Controller\Admin;

use App\Entity\Bien;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\File;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;



class BienCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bien::class;
    }


    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('description'),
           // ImageField::new('photo')->setUploadDir('public/upload'),
            //ImageField:: new('photo')
           // ->setBasePath('upload/')
          //  ->setUploadDir('public/upload/')
           // ->setUploadedFileNamePattern('[randomhash].[extension]'),

            BooleanField::new('vente'),
            TextField::new('type'),
            IntegerField::new('surface'),
            IntegerField::new('tailleDuTerrain'),
            IntegerField::new('nombreDePiece'),
            IntegerField::new('etage'),
            TextEditorField::new('adresse'),
            IntegerField::new('prix'),
            AssociationField::new('options'),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityInstance->setAgent($this->getUser());

        $entityManager->persist($entityInstance);
        $entityManager->flush();
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityManager->persist($entityInstance);
        $entityManager->flush();
    }
    
}
