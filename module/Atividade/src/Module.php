<?php

namespace Atividade;

use Laminas\ServiceManager\ServiceManager;
use Laminas\EventManager\EventInterface;

use Doctrine\ORM\EntityManager;

use Atividade\Controller\AtividadeController;

use Atividade\Service\AtividadeService;

class Module
{
    public function getConfig() : array
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * @inheritDoc
     */
    public function onBootstrap(EventInterface $e)
    {
        

    }    

    public function getServiceConfig()
    {
        return [
            'factories' => [
                AtividadeService::class => function(ServiceManager $serviceManager) {
                    $atividadeService = new AtividadeService();
                    $entityManager = $serviceManager->get(EntityManager::class);
                    $atividadeService->setEm($entityManager);
                    return $atividadeService;
                }
            ]
        ];
    }     
    
    public function getControllerConfig()
    {
        return [
            'factories' => [
                AtividadeController::class => function(ServiceManager $serviceManager) {
                    $atividadeService = $serviceManager->get(AtividadeService::class);

                    $controller = new AtividadeController(
                        $atividadeService
                    );

                    return $controller;
                }
            ]
        ];
    }

    /**
     * Expected to return an array of modules on which the current one depends on
     *
     * @return array
     */
    public function getModuleDependencies()
    {
        return [
            'Application'
        ];
    }
}