<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/12/2017
 * Time: 14:03
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('welcome.html.twig');
    }
}