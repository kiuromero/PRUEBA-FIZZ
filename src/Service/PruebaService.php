<?php

namespace App\Service;

use Doctrine\Persistence\ManagerRegistry;

class PruebaService
{

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function save($params)
    {
        $entityManager = $this->doctrine->getManager();
        $entityManager->persist($params);
        $entityManager->flush();

        return [
            'numero_inicial' => $params->getNumeroInicial(),
            'numero_final' => $params->getNumeroFinal(),
            'fecha_registro' => $params->getFechaRegistro(),
            'fizz_buzz' => $params->getFizzBuzz(),
        ];
    }

}
