<?php

namespace AppBundle\Form;

use AppBundle\Entity\Category;
use AppBundle\Entity\Receipt;
use AppBundle\Entity\ProductCategory;
use AppBundle\Entity\Subcategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceiptType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder ->add('name')
                   -> add('time_cooking', TimeType::class, ['input'  => 'datetime','widget' => 'choice',])
                   -> add('time_preparation', TimeType::class, ['input'  => 'datetime','widget' => 'choice',])
                   -> add('id', EntityType::class,['placeholder' => 'choose..','class' => Subcategory::class,'choice_label' => 'id'])
                   -> add('subcategory', EntityType::class,['placeholder' => 'choose..','class' => Subcategory::class,'choice_label' => 'name'])
                  // -> add('subcategory', ChoiceType::class,['choices' => ['maybe' => null, 'yes' => true, 'no' => false,]])
                   -> add('save', SubmitType::class);
   }

   public function configureOptions(OptionsResolver $resolver)
   {
        $resolver->setDefault('data_class',Receipt::class);
   }

   public function getBlockPrefix()
   {
        return 'app_bundle_product_type';
   }
}
?>