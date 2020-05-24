<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homepageAction()
    {
        $categories_arr = $this->getDoctrine()->getRepository('AppBundle:Category')->findAll();

        if (!$categories_arr) {
            throw $this->createNotFoundException('No categories found');
        }

        return  $this->render('base.html.twig',array('categories_arr' => $categories_arr));
    }
}




