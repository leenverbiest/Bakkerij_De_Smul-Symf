<?php
/**
 * Created by PhpStorm.
 * User: cyber10
 * Date: 16/03/2017
 * Time: 13:22
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\DBAL\Driver\PDOMySql;
use Doctrine\DBAL\Driver\PDOException;


class DefaultController extends Controller
{
    /**
     * @Route("/",name="home")
     */
    public function indexAction()
    {
//        if (!defined('PDO::ATTR_DRIVER_NAME')) {
//            return new Response( 'PDO unavailable');
//        }
//        elseif (defined('PDO::ATTR_DRIVER_NAME')) {
//            return new Response('PDO available');
//        }
        return new Response(\PDO::ATTR_DRIVER_NAME);

    }

}