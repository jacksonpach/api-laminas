<?php

declare(strict_types=1);

namespace Tags;

use Zend\ServiceManager\ServiceManager;
use Doctrine\ORM\EntityManager;

use Tags\Service\TagService;

class Module
{
    public function getConfig() : array
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                TagService::class => function(ServiceManager $serviceManager) {
                    $tagService = new TagService();
                    $entityManager = $serviceManager->get(EntityManager::class);
                    $tagService->setEm($entityManager);
                    return $tagService;
                }
            ]
        ];
    }        
}
