<?php

namespace App\Controller;

use App\Entity\Prueba;
use App\Service\PruebaService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PruebaController extends AbstractController
{
    public function __construct(Container $container)
    {
        $this->contenedor = $container;
        $this->pruebaService = $this->contenedor->get(PruebaService::class);
    }

    #[Route('/prueba', name: 'app_prueba')]
    function index(): Response
    {
        return $this->render('prueba.html.twig');
    }

    #[Route('/fizzBuzz', name: 'create_fizzbuzz')]
    function new(Request $request): JsonResponse
    {

        $json = $request->getContent();
        $params = json_decode($json);

        $prueba = new Prueba();
        $prueba->setNumeroInicial($params->numero_inicial);
        $prueba->setNumeroFinal($params->numero_final);
        $prueba->setFechaRegistro(new \DateTime('today'));
        $prueba->setFizzBuzz($this->generateFizzBuzz($params->numero_inicial, $params->numero_final));

        $result = $this->pruebaService->save($prueba);
        return new JsonResponse($result);
    }

    function generateFizzBuzz($numero_inicial, $numero_final)
    {
        $result = '';
        for ($i = $numero_inicial; $i <= $numero_final; $i++) {
            if ($i % 3 === 0 && $i % 5 === 0) {
                $result .= "FizzBuzz\n";
            } else if ($i % 3 === 0) {
                $result .= "Fizz\n";
            } else if ($i % 5 === 0) {
                $result .= "Buzz\n";
            } else {
                $result .= "$i\n";
            }
        }
        return $result;
    }
}
