<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Receipt;
use AppBundle\Entity\Subcategory;
use AppBundle\Repository\ReceiptRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SubcategoryController extends Controller
{
    /**
     *@Route("/subcategory/{id}", name="subcategory")
     */

    public function ShowSubcategoryContentAction($id)
    {
        $subcategory_arr = $this->getDoctrine()->getRepository(Subcategory::class)->findBy(array('category' => $id));
        $receipts_arr = $this->getDoctrine()->getRepository(Receipt::class)->findAll();

        if (!$subcategory_arr) {
            throw $this->createNotFoundException('No subcategory found');
        }

        return  $this->render('subcategory.html.twig',['subcategory_arr' => $subcategory_arr, 'receipts_arr' => $receipts_arr]);
    }
}
?>