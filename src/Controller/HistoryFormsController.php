<?php

namespace App\Controller;

use App\Entity\HistoryForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;


class HistoryFormsController extends AbstractController
{
    public function __construct(
        private LoggerInterface $logger,
    ) {
    } 
    #[Route('/add', name: 'historyaddpost', methods: ['GET'])]
    public function addget(): Response
    {
        //validacja
        //add to base
        //return
    return $this->json(['property'=>'value'],200);
    }

public function validReqest($request){
    $arrlenght=[ "name" =>255,
                "lastname" => 255,
                "email" => 100,
                "message" => 65535];
    foreach($request as $key => $value){
        $this->logger->info($arrlenght[$key]);
        if(!$this->validDataString($value,$arrlenght[$key]))
        {return false;}
        }
    return true;
    }

    
 public function validDataString($value,$lenght)
    {
        if(is_string($value)&&$value!=""&&strlen($value)<=$lenght)
        {return true;
        }else{
            return false;
        }
    }
    #[Route('/add', name: 'historyadd', methods: "POST")]

public function add(EntityManagerInterface $entityManager,Request $request): Response
{
 
   try {
  
    $requestAsArray = $request->toArray();
    var_dump(\count($requestAsArray));

} catch (JsonException $e) {
    echo $e->getMessage()."\n";
    $this->logger->info($e->getMessage()."\n");
    return new Response($e, 401);
}
   /*
$this->logger->info(print_r($requestAsArray, true));
$this->logger->info(gettype($requestAsArray["name"]));
*/

if($this->validReqest($requestAsArray))
{
    $form=new HistoryForm();
    $form->setName($requestAsArray["name"]);
    $form->setLastname($requestAsArray["lastname"]);
    $form->setEmail($requestAsArray["email"]);
    $form->setMessage($requestAsArray["message"]);
    $date =new \DateTimeImmutable("now");    
    $form->setTimesave($date);
    $entityManager->persist($form);
    $entityManager->flush();
    return new Response('Saved new form with id '.$form->getId());
}else
{
   return new Response('', 201);
}
//*/
}
}