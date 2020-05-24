<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Car;
use AppBundle\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends Controller
{
    /**
     *@Route("/car")
     */

    public function ShowCarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $CarArray = $em->getRepository('AppBundle:Car')->findAll();

        return $this -> render('car.html.twig', array('CarArray'=>$CarArray));

    }
}
?>