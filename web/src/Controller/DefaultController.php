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
     * @Route("/default", name="default")
     */
    public function index(ItemsService $items, Request $request)
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


//        return $this->json(['username'=>'ble']);

//        return new Response("ble");

//        return new Response($var);

//        return $this->redirectToRoute('default2');
    }

//    /**
//     * @Route("/blog/{page?}", name="blog_list", requirements={"page"="\d+"})
//     */
//    public function index2() {
//
//        return new Response("Route 2");
//
//    }

//    /**
//     * @Route("/articles/{locale}/{year}/{slug}/{category}",
//     *     defaults={"category":"computers"},
//     *     name="blog_list",
//     *     requirements={
//         *     "locale":"en|fr",
//         *     "page"="\d+",
//         *     "category":"computers|rtv",
//         *     "year":"\d+" }
//     *     )
//     */
//    public function index3() {
//
//        return new Response("Route 3");
//
//    }

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
