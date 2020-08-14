<?php

namespace Atividade\Controller;

use Laminas\Mvc\Controller\AbstractRestfulController;
use Laminas\ServiceManager\ServiceManager;
use Laminas\View\Model\JsonModel;
use Laminas\Http\Request;

use Application\Controller\ApiController;
use Atividade\Service\AtividadeService;

/**
 * Class AtividadeController
 * @package Atividade\Controller;
 */

class AtividadeController extends ApiController
{
   /**
    * @var AtividadeService $service
    */
   protected $service;

   public function __construct(AtividadeService $service)
   {
      $this->service = $service;
   }

   /**
    * @return JsonModel
    */
   public function get($id)
   {
      $item = $this->service->getItem($id);
      if (empty($item)) {
         $this->httpStatusCode = 400;
      }

      $data = [
         'item' => $item
      ];

      return $this->createResponse($data);
   }

   /**
    * @return JsonModel
    */
   public function getList()
   {
      $list = $this->service->getListRawQuery();

      $data = [
         'list' => $list
      ];

      return $this->createResponse($data);
   }
}
