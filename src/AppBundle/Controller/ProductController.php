<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     *@Route("products", name="products")
     */

    public function ShowProductsAction()
    {
        $products_arr = $this->getDoctrine()->getRepository('AppBundle:Product')->findAllProducts();

        if (!$products_arr) {
            throw $this->createNotFoundException('No products found');
        }

        return  $this->render('products.html.twig',array('products_arr' => $products_arr));
    }

    /**
     * @Route("new_product", name="new_product")
     */

    public function newProduct(Request $request){

        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('products');
        }
        return $this->render('new_product.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("edit_product/{id}", name="edit_product")
     */

    public function editProduct(Request $request, $id){

        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('products');
        }
        return $this->render('edit_product.html.twig', ['form'=>$form->createView()]);
    }
}
?>