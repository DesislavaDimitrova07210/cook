<?php

namespace AppBundle\Form;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Entity\ProductCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Annotation\Route;

class ProductType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder->add('name')
       ->add('category', EntityType::class,[
           'class' => ProductCategory::class,
           'choice_label' => 'name'
       ])
       ->add('save', SubmitType::class);
   }

   public function configureOptions(OptionsResolver $resolver)
   {
        $resolver->setDefault('data_class',Product::class);
   }

   public function getBlockPrefix()
   {
        return 'app_bundle_product_type';
   }
}
?>