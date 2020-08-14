<?php

namespace Atividade\Service;

use Doctrine\ORM\EntityManager;
use Laminas\Hydrator\ClassMethods;
use Laminas\Filter\FilterChain;
use Cocur\Slugify\Slugify;

use Application\Service\BaseService;
use Atividade\Entity\Atividade;

class AtividadeService extends BaseService
{
   /**
    * @var int
    */
   private $id = 0;

   /**
    * @var Atividade
    */
   private $entity;

   /**
    * Atividade constructor
    */
   public function __construct()
   {
      $this->entity = Atividade::class;
   }

   /**
    * @return array
    */
   public function getItem(int $id): array
   {
      $atividade = $this->em->getRepository($this->entity)->findOneBy(['id' => $id]);
      if ($atividade) {
         return $atividade->toArray();
      }

      return [];
   }

   /**
    * @return array
    */
   public function getListRawQuery(): array
   {
      $sql = ' SELECT * FROM atividade ';
      return $this->executeSql($sql, "all");
   }
}
