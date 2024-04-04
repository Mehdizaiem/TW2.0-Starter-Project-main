<?php

namespace App\Form;

use App\Entity\Auction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType; // Use FileType
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuctionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('auctionname')
            ->add('price')
            ->add('date')
            ->add('time')
            ->add('description')
            ->add('imageFile', FileType::class, [ // Use FileType for file input
                'label' => 'Upload Photo',
                'mapped' => false, // This tells Symfony not to try to map this field to a property of your entity
                'required' => false, // The file input is not required
            ])
            ->add('userid');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Auction::class,
        ]);
    }
}
