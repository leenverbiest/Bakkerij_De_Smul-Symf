<?php
/**
 * Created by PhpStorm.
 * User: cyber10
 * Date: 14/03/2017
 * Time: 10:35
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class KlantController extends Controller
{
    /**
     * @Route("/klant/{klantNaam}")
     */
    public function showAction($klantNaam)
    {
        $funFact='U kunt vanaf nu *funbroodjes* kopen!';

        $cache=$this->get('doctrine_cache.providers.my_markdown_cache');
        $key=password_hash($funFact,PASSWORD_DEFAULT);
        if ($cache->contains($key)){
            $funFact=$cache->fetch($key);
        }else{
            sleep(1); //fake how slow this could be
            $funFact=$this->get('markdown.parser')
                ->transform($funFact);
            $cache->save($key,$funFact);
        }
        return $this->render('klant/show.html.twig',[
           'naam' =>$klantNaam,
            'funFact'=>$funFact
        ]);

    }
    /**
     * @Route("/klant/{klantNaam}/notes",name="klant_show_berichten")
     * @Method("Get")
     */
    public function getNotesAction()
    {
        $notes=[
            ['id'=>1,'email'=>'leen@gmail.com','note'=>'Welkom Leen'],
            ['id'=>2,'email'=>'vincent@gmail.com','note'=>'Welkom Vincent'],
            ['id'=>3,'email'=>'tom@gmail.com','note'=>'Welkom Tom']
        ];
        $data=[
          'notes'=>$notes
        ];

        return new JsonResponse($data);

    }

}