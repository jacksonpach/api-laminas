<?php

namespace Atividade\Controller\Factory;

use Laminas \ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use Atividade\Controller\AtividadeController as Controller;
use Atividade\Service\AtividadeService;

class AtividadeControllerFactory implements FactoryInterface
{
   public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
   {
      return new Controller(
         $container->get(AtividadeService::class),
      );
   }
}