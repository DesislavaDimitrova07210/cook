<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Receipt;
use AppBundle\Form\ReceiptType;
use AppBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReceiptController extends Controller
{
    /**
     *@Route("/receipt/{id}", name="receipt")
     */

    public function ShowReceiptAction($id)
    {
            $receipts_arr = $this->getDoctrine()->getRepository(Receipt::class)->findBy(array('id' => $id));

            if (!$receipts_arr) {
                throw $this->createNotFoundException('No receipt found');
            }

            return  $this->render('receipt.html.twig',array('receipt_arr' => $receipts_arr));
    }

    /**
     * @Route("new_receipt", name="new_receipt")
     */

    public function newReceipt(Request $request) {

        $receipt = new Receipt();
        $category = new Category();
        $receiptForm = $this->createForm(ReceiptType::class, $receipt);
        $categoryForm = $this->createForm(CategoryType::class, $category);

        $receiptForm->handleRequest($request);

        if ($receiptForm->isSubmitted() && $receiptForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($receipt);
            $em->flush();
            return $this->redirectToRoute('products');
        }
        return $this->render('new_receipt.html.twig', ['receiptForm'=>$receiptForm->createView(), 'categoryForm'=>$categoryForm->createView()]);
    }

}
?>