<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        $blehs = ['ble1','ble2'];
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'blehs' => $blehs,
            ] );

//        return $this->json(['username'=>'ble']);

//        return new Response("ble");

//        return new Response($var);

//        return $this->redirectToRoute('default2');


    }

//    /**
//     * @Route("/default2", name="default2")
//     */
//    public function index2()
//    {
//
//       return new Response("ble2");
//
//    }

}
