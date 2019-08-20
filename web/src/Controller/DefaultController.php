<?php

namespace App\Controller;

use App\Entity\Blehs;
use App\Services\ItemsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DefaultController extends AbstractController
{


    public function __construct($logger) {
        // logger service

    }

    /**
     * @Route("/home", name="default", name="home")
     */
    public function index(ItemsService $items, Request $request) {
        dump("ble");

        $entityManager = $this->getDoctrine()->getManager();
        $conn = $entityManager -> getConnection();

        $sql = '
        INSERT INTO blehs(name) VALUES (:num)
        ';

        $q = $conn -> prepare($sql);
        $q -> execute(['num' => 1]);


//        $entityManager = $this -> getDoctrine() -> getManager();
//
//        $blehs1 = new Blehs();
//        $blehs1 -> setName("good");
//
//        $entityManager -> persist($blehs1);
//        $entityManager -> flush();
//
//        dump ('saved '. $blehs1->getId());

        $blehs = $this -> getDoctrine() -> getRepository(Blehs::class) -> findAll();

        if (!$blehs) {
            throw $this -> createNotFoundException('Blehs exception');
        }

        $cookie = new Cookie (
            'example_cookie',
            '12122323',
            time() + (3600)
        );

        $res = new Response();
        $res = $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'blehs' => $blehs,
            'bleh_items' => $items -> items,
        ] );
        $res -> headers -> setCookie($cookie);
        $res -> send();



//        return $this->redirectToRoute('default2');
    }


    /**
     * @Route("/paramconv/{id}", name="paramconv")
     */

    public function paramconv(Blehs $blehs) {
        dump($blehs);
    }


    /**
    * @Route("/generate_url/{param?}", name="generate_url")
    */

    public function generate_url() {
        exit($this -> generateUrl(
            'generate_url',
            array('param' => 10),
            UrlGeneratorInterface::ABSOLUTE_URL
        ));
    }

    /**
     * @Route("/download", name="download")
     */

    public function download() {
        $path = $this -> getParameter('download_directory');
        return $this -> file($path.'test.pdf');
    }

    /**
     * @Route("/redirect_1")
     */

    public function redirect_1() {
        return $this -> redirectToRoute('redirect_2', array('param' => 10));
    }

    /**
     * @Route("/redirect_2", name="redirect_2")
     */

    public function redirect_2() {
        exit('Test redirect_2');
    }

    /**
     * @Route("/redirect_controller")
     */

    public function redirect_controller() {
        $res = $this -> forward(
            'App\Controller\DefaultController::redirect_controller_forward_to', array('param' => 1)
        );
        return $res;
    }

    /**
     * @Route("/redirect_controller_forward_to/{param?}", name="redirect_controller_forward_to")
     */

    public function redirect_controller_forward_to($param) {
        exit('Test controller forwarding ' .$param);
    }
}
