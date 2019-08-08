<?php

namespace App\Controller;

use App\Entity\Blehs;
use App\Services\ItemsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(ItemsService $items)
    {
//        $blehs = ['ble1','ble2'];

//        ### db save ###
/*      $entityManager = $this -> getDoctrine() -> getManager();
        $blehs1 = new Blehs;
        $blehs1 -> setName("ugleh3");

        $blehs2 = new Blehs;
        $blehs2 -> setName("ugleh4");

        $entityManager -> persist($blehs1);
        $entityManager -> persist($blehs2);
        $entityManager -> flush();
*/


        $blehs = $this -> getDoctrine() -> getRepository(Blehs::class) -> findAll();

        $cookie = new Cookie (
            'example_cookie',
            '12122323',
            time() + (3600)
        );



        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'blehs' => $blehs,
            'bleh_items' => $items -> items,
            ] );


        $res = new Response();
        $res -> headers -> setCookie($cookie);
        $res -> send();


//        return $this->json(['username'=>'ble']);

//        return new Response("ble");

//        return new Response($var);

//        return $this->redirectToRoute('default2');
    }

    /**
     * @Route("/blog/{page?}", name="blog_list", requirements={"page"="\d+"})
     */
    public function index2() {

        return new Response("Route 2");

    }

    /**
     * @Route("/articles/{locale}/{year}/{slug}/{category}",
     *     defaults={"category":"computers"},
     *     name="blog_list",
     *     requirements={
         *     "locale":"en|fr",
         *     "page"="\d+",
         *     "category":"computers|rtv",
         *     "year":"\d+" }
     *     )
     */
    public function index3() {

        return new Response("Route 3");

    }

}
