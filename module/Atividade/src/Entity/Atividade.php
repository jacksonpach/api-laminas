<?php

namespace Atividade\Entity;

use Doctrine\ORM\Mapping as ORM;
use Laminas\Hydrator\ClassMethods;
use Laminas\Hydrator\NamingStrategy\UnderscoreNamingStrategy;

/**
 * @ORM\Table(name="atividade")
 * @ORM\Entity 
 **/

class Atividade
{
   /**
    * @var integer
    *
    * @ORM\Column(name="id", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
   protected $id;

   /**
    * @var string
    *
    * @ORM\Column(name="email", type="string", length=50, nullable=true)
    */
   protected $email;

   /**
    * @var string
    *
    * @ORM\Column(name="first_name", type="string", length=50, nullable=true)
    */
   protected $first_name;

   /**
    * @var string
    *
    * @ORM\Column(name="last_name", type="string", length=50, nullable=true)
    */
   protected $last_name;

   /**
    * @var string
    *
    * @ORM\Column(name="avatar", type="string", length=50, nullable=true)
    */
   protected $avatar;

   /**
    * Cartao constructor.
    * @param array $input
    */
   public function __construct(array $input = [])
   {
      if (!empty($input)) {
         $this->exchangeArray($input);
         //$this->creationDate = new \Datetime();
         //$this->creationTime = new \Datetime();
      }
   }

   /**
    * @param $input
    */
   public function exchangeArray(array $input)
   {
      $hydrator = new ClassMethods(false);
      $hydrator->setNamingStrategy(new UnderscoreNamingStrategy());
      $hydrator->hydrate($input, $this);
   }

   /**
    * @return array
    */
   public function toArray()
   {
      $extractData =  (new ClassMethods(true))->extract($this);
      //unset($extractData['created_at']);
      //unset($extractData['updated_at']);
      return $extractData;
   }

   /**
    * Get the value of id
    *
    * @return  integer
    */
   public function getId()
   {
      return $this->id;
   }

   /**
    * Set the value of id
    *
    * @param  integer  $id
    *
    * @return  self
    */
   public function setId($id)
   {
      $this->id = $id;

      return $this;
   }

   /**
    * Get the value of email
    *
    * @return  string
    */ 
   public function getEmail()
   {
      return $this->email;
   }

   /**
    * Set the value of email
    *
    * @param  string  $email
    *
    * @return  self
    */ 
   public function setEmail(string $email)
   {
      $this->email = $email;

      return $this;
   }

   /**
    * Get the value of first_name
    *
    * @return  string
    */ 
   public function getFirst_name()
   {
      return $this->first_name;
   }

   /**
    * Set the value of first_name
    *
    * @param  string  $first_name
    *
    * @return  self
    */ 
   public function setFirst_name(string $first_name)
   {
      $this->first_name = $first_name;

      return $this;
   }

   /**
    * Get the value of last_name
    *
    * @return  string
    */ 
   public function getLast_name()
   {
      return $this->last_name;
   }

   /**
    * Set the value of last_name
    *
    * @param  string  $last_name
    *
    * @return  self
    */ 
   public function setLast_name(string $last_name)
   {
      $this->last_name = $last_name;

      return $this;
   }

   /**
    * Get the value of avatar
    *
    * @return  string
    */ 
   public function getAvatar()
   {
      return $this->avatar;
   }

   /**
    * Set the value of avatar
    *
    * @param  string  $avatar
    *
    * @return  self
    */ 
   public function setAvatar(string $avatar)
   {
      $this->avatar = $avatar;

      return $this;
   }
}
