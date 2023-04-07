<?php

namespace App\Form;

use App\Entity\ProjectImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ImageCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
 
            ->add('ImageFile', VichFileType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Image'
                ],
            ]

            )

            ;
         
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProjectImage::class,
            'csrf_protection' => false
        ]);
    }
}